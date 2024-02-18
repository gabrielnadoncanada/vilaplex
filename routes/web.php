<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Home;
use App\Http\Livewire\PageComponent;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    Route::get(LaravelLocalization::transRoute('routes.home'), \App\Http\Livewire\HomeComponent::class)->name('home');
    Route::get(LaravelLocalization::transRoute('routes.contact'), \App\Http\Livewire\ContactComponent::class)->name('contact');
    Route::get(LaravelLocalization::transRoute('routes.page'), PageComponent::class)->name('page.view');
    Route::get(LaravelLocalization::transRoute('routes.service.show'), \App\Http\Livewire\ServiceComponent::class)->name('service.show');

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
});
