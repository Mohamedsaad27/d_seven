<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ShippingZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['user', 'shippingZone', 'orderItems.product', 'orderItems.color.color']);

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q
                    ->where('id', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery
                            ->where('name_ar', 'like', "%{$search}%")
                            ->orWhere('name_en', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('shipping_zone')) {
            $query->where('shipping_zone_id', $request->shipping_zone);
        }

        // Sort by latest first
        $query->orderBy('created_at', 'desc');

        $orders = $query->paginate(15)->withQueryString();

        // Get statistics
        $stats = $this->getOrderStats();

        // Get shipping zones for filter
        $shippingZones = ShippingZone::all();

        return view('dashboard.order.index', compact('orders', 'stats', 'shippingZones'));
    }

    public function show($id)
    {
        $order = Order::with([
            'user',
            'shippingZone',
            'orderItems.product.productImages',
            'orderItems.color.color',
            'orderItems.size'
        ])->findOrFail($id);

        return view('dashboard.order.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $oldStatus = $order->status;
        $order->status = $request->status;
        $order->save();

        // You can add notification logic here
        // For example, send email to customer about status change

        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'Order status updated successfully',
                'new_status' => $request->status,
                'old_status' => $oldStatus
            ]);
        }

        return redirect()->back()->with('success', 'Order status updated successfully');
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);

            // Delete order items first
            $order->orderItems()->delete();

            // Delete the order
            $order->delete();

            if (request()->ajax()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Order deleted successfully'
                ]);
            }

            return redirect()->route('dashboard.orders.index')->with('success', 'Order deleted successfully');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error deleting order: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Error deleting order');
        }
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,update_status',
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:orders,id',
            'status' => 'required_if:action,update_status|in:pending,processing,completed,cancelled'
        ]);

        try {
            DB::beginTransaction();

            if ($request->action === 'delete') {
                // Delete order items first
                DB::table('order_items')->whereIn('order_id', $request->order_ids)->delete();

                // Delete orders
                Order::whereIn('id', $request->order_ids)->delete();

                $message = 'Selected orders deleted successfully';
            } else {
                // Update status
                Order::whereIn('id', $request->order_ids)->update(['status' => $request->status]);

                $message = 'Selected orders status updated successfully';
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'Error processing bulk action: ' . $e->getMessage()
            ], 500);
        }
    }

    private function getOrderStats()
    {
        return [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'today' => Order::whereDate('created_at', today())->count(),
            'this_month' => Order::whereMonth('created_at', now()->month)->count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total_price')
        ];
    }

    public function export(Request $request)
    {
        // You can implement CSV/Excel export here
        // For now, returning a simple response
        return response()->json([
            'status' => true,
            'message' => 'Export functionality will be implemented'
        ]);
    }

    public function sendConfirmationEmail($id)
    {
        $order = Order::findOrFail($id);
        Mail::to($order->user->email)->send(new OrderConfirmation($order));

        return redirect()->back()->with('success', 'Order confirmation email sent successfully');
    }
}
