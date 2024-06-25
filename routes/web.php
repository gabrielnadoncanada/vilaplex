<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::redirect('/login', '/admin/login')->name('login');
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect'],
], function () {
    Route::get(LaravelLocalization::transRoute('routes.blog.show'), [BlogController::class, 'show'])->name('blog.show');
    Route::get(LaravelLocalization::transRoute('routes.service.show'), [ServiceController::class, 'show'])->name('service.show');
    Route::get('/{slug?}', [PageController::class, 'show']);
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});
Route::get('/sitemap', [SitemapController::class, 'pretty']);
