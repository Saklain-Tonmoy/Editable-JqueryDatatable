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

Route::get('/', function () {
    return view('welcome');
});

Route::get('table', [\App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('table/action', [\App\Http\Controllers\EmployeeController::class, 'action'])->name('table.action');
