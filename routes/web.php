<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::any('initdb', function () {

    $user = \App\Models\User::find(1);
    $user->uuid = \DB::raw('UUID()');
    $user->isadmin = 1;

    $user->save();
    
});



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/subscription', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('subscription.index');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');


        Route::get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('member.index');
        Route::get('/member/create', [App\Http\Controllers\MemberController::class, 'create'])->name('member.create');
        Route::post('/member/create', [App\Http\Controllers\MemberController::class, 'store'])->name('member.store');
        Route::get('/member/edit/{id}', [App\Http\Controllers\MemberController::class, 'edit'])->name('member.edit');
        Route::post('/member/edit/{id}', [App\Http\Controllers\MemberController::class, 'update'])->name('member.update');
        Route::post('/member/delete/{uuid}', [App\Http\Controllers\MemberController::class, 'delete'])->name('member.delete');

        Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
        Route::post('/user/create', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::post('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

        Route::get('/subscription/user', [App\Http\Controllers\SubscriptionController::class, 'userSubscription'])->name('subscription.user');
        Route::post('/subscription/active/{id}', [App\Http\Controllers\SubscriptionController::class, 'active'])->name('subscription.active');
    });

    Route::get('/subscription/confirm/{id}', [App\Http\Controllers\SubscriptionController::class, 'confirm'])->name('subscription.confirm');
    Route::post('/subscription/confirm/{id}', [App\Http\Controllers\SubscriptionController::class, 'store'])->name('subscription.store'); 
    
    
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');

});

