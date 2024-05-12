<?php

use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ThumbnailController;
use App\MoonShine\Controllers\SettingController;

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

Route::get('/', [PageController::class, 'home'])->name('home');


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::controller(SocialController::class)->group(function(){

    Route::get('/auth/socialite/{driver}', 'redirect')->name('socailite.redirect');

    Route::get('/auth/socialite/{driver}/callback', 'callback')->name('socailite.callback');
    
});

Route::get('/unit/{slug}', [UnitController::class, 'show'])->name('unit.show');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');




Route::middleware(['auth:web'])->group(function () {

    Route::get('/profile', [UserController::class, 'show'])
        ->name('profile');
    
    Route::post('/profile/store', [UserController::class, 'store'])
        ->name('profile.store');
    
    Route::post('/logout', [AuthController::class, 'destroy'])
                ->name('logout');
});

Route::post('/vote/{id}', [LikeController::class, 'toVote'])
    ->name('vote');

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login-vk');
});

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');

Route::middleware('moonshine')->name('moonshine.')->prefix(config('moonshine.route.prefix'))->group(function () {    

    Route::post('/setting-form/update', SettingController::class)->name('setting.update');
});


Route::get('/storage/images/{dir}/{method}/{year}/{month}/{day}/{size}/{file}',ThumbnailController::class)
->where('method','resize|crop|fit')
->where('year','\d{4}$')
->where('month','\d{2}$')
->where('day','\d{2}$')
->where('size','(\d+|null)x(\d+|null)')
->where('file','.+\.(png|jpg|gif|bmp|svg|jpeg)$')
->name('thumbnail');


           
