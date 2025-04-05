<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\ShippingZoneRepositoryInterface;
use Illuminate\Http\Request;

class ShippingZoneController extends Controller
{
    protected $shippingZoneRepository;

    public function __construct(ShippingZoneRepositoryInterface $shippingZoneRepository)
    {
        $this->shippingZoneRepository = $shippingZoneRepository;
    }

    public function index()
    {
        $shippingZones = $this->shippingZoneRepository->getAllShippingZones();
        return view('dashboard.shippingZone.index', compact('shippingZones'));
    }

    public function create()
    {
        return view('dashboard.shippingZone.create');
    }

    public function store(Request $request)
    {
        $this->shippingZoneRepository->createShippingZone($request);
        return redirect()->route('shipping_zone.index')->with('success', 'Shipping Zone created successfully');
    }

    public function edit(Request $request, $id)
    {
        $shippingZone = $this->shippingZoneRepository->editShippingZone($id, $request);
        return view('dashboard.shippingZone.edit', compact('shippingZone'));
    }

    public function update($id, Request $request)
    {
        $this->shippingZoneRepository->updateShippingZone($id, $request);
        return redirect()->route('shipping_zone.index')->with('success', 'Shipping Zone updated successfully');
    }

    public function destroy($id)
    {
        $this->shippingZoneRepository->deleteShippingZone($id);
        return redirect()->route('shipping_zone.index')->with('success', 'Shipping Zone deleted successfully');
    }
}
