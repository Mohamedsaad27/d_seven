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
            $trendingProducts = Product::with('productImages', 'reviews', 'discounts')
                ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                ->select('products.*', DB::raw('AVG(reviews.rating) as average_rating'))
                ->groupBy([
                    'products.id', 'products.name_en', 'products.name_ar', 'products.description_en',
                    'products.description_ar', 'products.price', 'products.status', 'products.stock',
                    'products.brand_id', 'products.category_id', 'products.created_at', 'products.updated_at'
                    // Add any other columns from the products table that exist in your schema
                ])
                ->orderByDesc('average_rating')
                ->take(4)
                ->get();

            // If no reviews either, fallback to highest price
            if ($trendingProducts->isEmpty()) {
                $trendingProducts = Product::with('productImages', 'discounts')
                    ->orderByDesc('price')
                    ->take(4)
                    ->get();
            }
        }

        $topRated = Product::with('productImages')
            ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
            ->select('products.*', DB::raw('AVG(reviews.rating) as average_rating'))
            ->groupBy([
                'products.id', 'products.name_en', 'products.name_ar', 'products.description_en',
                'products.description_ar', 'products.price', 'products.status', 'products.stock',
                'products.brand_id', 'products.category_id', 'products.created_at', 'products.updated_at'
                // Add any other columns from the products table that exist in your schema
            ])
            ->orderByDesc('average_rating')
            ->take(3)
            ->get();

        $newArrivals = Product::orderByDesc('created_at')
            ->with('productImages')
            ->take(3)
            ->get();

        $bestSellers = Product::with('productImages')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->select('products.*', DB::raw('SUM(order_items.quantity) as total_ordered'))
            ->groupBy([
                'products.id', 'products.name_en', 'products.name_ar', 'products.description_en',
                'products.description_ar', 'products.price', 'products.status', 'products.stock',
                'products.brand_id', 'products.category_id', 'products.created_at', 'products.updated_at'
                // Add any other columns from the products table that exist in your schema
            ])
            ->orderByDesc('total_ordered')
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
