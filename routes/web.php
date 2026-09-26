<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth.basic']], function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::post('/report/sum', [ReportController::class, 'sum']);
    Route::post('/report/cdr', [ReportController::class, 'cdr']);
});

