<?php

namespace App\Providers;

use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\CartRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ColorRepositoryInterface;
use App\Interfaces\ContactRepositoryInterface;
use App\Interfaces\DiscountRepositoryInterface;
use App\Interfaces\FavoriteRepositoryInterface;
use App\Interfaces\ProductDashboardInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\ReviewRepositoryInterface;
use App\Interfaces\ShippingZoneRepositoryInterface;
use App\Interfaces\SizeRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\ContactRepository;
use App\Repositories\DiscountRepository;
use App\Repositories\FavoriteRepository;
use App\Repositories\ProductDashboardRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\ShippingZoneRepository;
use App\Repositories\SizeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(DiscountRepositoryInterface::class, DiscountRepository::class);
        $this->app->bind(FavoriteRepositoryInterface::class, FavoriteRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(ShippingZoneRepositoryInterface::class, ShippingZoneRepository::class);
        $this->app->bind(ProductDashboardInterface::class, ProductDashboardRepository::class);
        $this->app->bind(ColorRepositoryInterface::class, ColorRepository::class);
        $this->app->bind(SizeRepositoryInterface::class, SizeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
