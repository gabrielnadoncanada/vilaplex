<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::redirect('/login', '/admin/login')->name('login');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect'],
], function () {
    Route::get(LaravelLocalization::transRoute('routes.service.index'), [PageController::class, 'serviceIndex'])->name('service.index');
    Route::get(LaravelLocalization::transRoute('routes.blog.index'), [PageController::class, 'blogIndex'])->name('blog.index');
    Route::get(LaravelLocalization::transRoute('routes.page.index'), [PageController::class, 'index'])->name('page.index');
    Route::get(LaravelLocalization::transRoute('routes.page.show'), [PageController::class, 'show'])->name('page.show');

    Route::get(LaravelLocalization::transRoute('routes.service.show'), [ServiceController::class, 'show'])->name('service.show');

    Route::get(LaravelLocalization::transRoute('routes.blog.show'), [ServiceController::class, 'show'])->name('blog.show');
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire/update', $handle);
});
