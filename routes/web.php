<?php
use Illuminate\Support\Facades\Auth;
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
Route::post('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return response('Set locale already.',200);
})->name('locale');

Auth::routes(['verify' => true,'register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::get('/users', function () {
    return view('home');
})->middleware(['auth','password.confirm']);

Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*');




