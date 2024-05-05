<?php

use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PostComponent;
use App\Http\Livewire\PostsComponent;
use App\Http\Livewire\ServiceComponent;
use Illuminate\Support\Facades\Route;
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
    'middleware' => ['localizationRedirect'],
], function () {
    Route::get(LaravelLocalization::transRoute('routes.home'), HomeComponent::class)->name('home');
    Route::get(LaravelLocalization::transRoute('routes.contact'), ContactComponent::class)->name('contact');
    Route::get(LaravelLocalization::transRoute('routes.about'), AboutComponent::class)->name('about');
//    Route::get(LaravelLocalization::transRoute('routes.page'), PageComponent::class)->name('page');
    Route::get(LaravelLocalization::transRoute('routes.service'), ServiceComponent::class)->name('service');
    Route::get(LaravelLocalization::transRoute('routes.posts'), PostsComponent::class)->name('posts');
    Route::get(LaravelLocalization::transRoute('routes.post'), PostComponent::class)->name('post');
//    Route::get(LaravelLocalization::transRoute('routes.post'), PostComponent::class)->name('post');

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
});
