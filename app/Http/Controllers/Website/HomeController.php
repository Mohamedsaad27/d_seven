<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('products', 'children', 'parent')->take(6)->get();
        $brands = Brand::with('products')->take(5)->get();

        $latestProduct = Product::latest()->first();

        // Trending products by order quantity
        $trendingProducts = Product::whereIn('id', function ($query) {
            $query
                ->select('product_id')
                ->from('order_items')
                ->groupBy('product_id')
                ->orderByDesc(DB::raw('SUM(quantity)'));
        })
            ->with('productImages', 'reviews', 'discounts')
            ->get();

        // If no trending products, fallback to highest rated
        if ($trendingProducts->isEmpty()) {
            DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

            $trendingProducts = Product::select('products.*', DB::raw('AVG(reviews.rating) as average_rating'))
                ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                ->groupBy('products.id')
                ->orderByDesc('average_rating')
                ->with('productImages', 'reviews', 'discounts')
                ->take(4)
                ->get();

            // Reset SQL mode back to default
            DB::statement("SET SESSION sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'))");

            // If no reviews either, fallback to highest price
            if ($trendingProducts->isEmpty()) {
                $trendingProducts = Product::with('productImages', 'discounts')
                    ->orderByDesc('price')
                    ->take(4)
                    ->get();
            }
        }
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        $topRated = Product::select('products.*', DB::raw('AVG(reviews.rating) as average_rating'))
            ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
            ->groupBy('products.id')
            ->orderByDesc('average_rating')
            ->with('productImages')
            ->take(3)
            ->get();
        // Reset the SQL mode back to default
        DB::statement("SET SESSION sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'))");
        $newArrivals = Product::orderByDesc('created_at')
            ->with('productImages')
            ->take(3)
            ->get();
        $bestSellers = Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_ordered'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id')
            ->orderByDesc('total_ordered')
            ->with('productImages')
            ->take(3)
            ->get();
        if ($bestSellers->isEmpty()) {
            $bestSellers = Product::select('products.*')
                ->orderByDesc('price')
                ->with('productImages')
                ->take(3)
                ->get();
        }

        return view('website.index', compact('categories', 'brands', 'latestProduct', 'trendingProducts', 'topRated', 'newArrivals', 'bestSellers'));
    }
}
