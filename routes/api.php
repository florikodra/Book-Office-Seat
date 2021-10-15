<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resources([
    'companies' => CompanyController::class,
    'offices' => OfficeController::class,
    'employees' => EmployeeController::class,
]);

Route::post('reserved/', [ReservationController::class, 'getReservedSeats'])->name('reserved.seats');
Route::post('reserve/', [ReservationController::class, 'reserveSeat'])->name('reserve.seat');

