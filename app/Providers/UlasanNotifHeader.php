<?php

namespace App\Providers;

use App\Models\Pesanan;
use App\Models\Ulasan;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class UlasanNotifHeader extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.templates.parts.header', function ($view) {
            $ulasan = Ulasan::with('Pesanan')->latest()->limit(3)->get();
            $view->with('ulasan', $ulasan);
        });
    }
}
