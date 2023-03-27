<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use GuzzleHttp\RedirectMiddleware;
use App\Models\Plan;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function (Request $request) {
    return view('login');
})->name('customer.login');

Route::post('/login', '\App\Http\Controllers\CustomerController@login');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('customer.forgot-password');

Route::post('/forgot-password', '\App\Http\Controllers\CustomerController@forgotPasswordWeb');

Route::post('customer', '\App\Http\Controllers\CustomerController@create');

Route::get('/payment-completed', function () {
    return view('payment-completed');
});

Route::middleware('auth.customer')->group(function () {
    Route::get('/checkout', function (Request $request) {
        if (!$request->has('plan')) {
            return redirect('select-plan');
        }
        return view('checkout', [
            'subscription_package' => $request->plan,
        ]);
    });
    Route::post('/checkout/pay', [
        'uses' => 'App\Http\Controllers\SubscriptionController@buyPlan',
    ]);
    Route::get('/select-plan', '\App\Http\Controllers\SubscriptionController@getPlans');
    Route::get('/logout', function (Request $request) {
        auth('customer')->logout();
        return redirect('/login');
    });
});