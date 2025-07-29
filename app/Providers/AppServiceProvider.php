<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Visitor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ambil jumlah visitor untuk halaman 'home'
        $homeVisitor = Visitor::where('page', 'home')->first();
        $visits = $homeVisitor ? $homeVisitor->visits : 0;

        // Bagikan ke semua view
        View::share('visits', $visits);
    }
}
