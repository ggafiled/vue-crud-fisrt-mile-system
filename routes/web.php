<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Services\ExportCustomerTemplatService;
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
Route::post('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return response('Set locale already.', 200);
})->name('locale');

Auth::routes(['verify' => true, 'register' => false]);

Route::get('/dowloadCustomerTemplate', function () {
    return ExportCustomerTemplatService::getCustomerTemplate();
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::get('/users', function () {
    return view('home');
})->middleware(['auth', 'password.confirm']);

Route::get('/{vue_capture?}_window', function () {
    return view('portal')->with("title", "Pick data");
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/{vue_capture?}', function () {
    return view('home')->with("title", "Fist Mile ERP System");
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/file-import-export', [ContractorController::class, 'fileImportExport']);
Route::post('/file-import', [ContractorController::class, 'fileImport'])->name('file-import');
Route::get('/file-export', [ContractorController::class, 'fileExport'])->name('file-export');
