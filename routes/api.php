<?php

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\EmployeeAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('products', [ProductAPIController::class, 'getAllProducts'])->name('products');
Route::post('products', [ProductAPIController::class, 'createProduct'])->name('products.store');
Route::get('products/{product}', [ProductAPIController::class, 'showProduct'])->name('products.show');
Route::put('products/{product}', [ProductAPIController::class, 'updateProduct'])->name('products.update');
Route::delete('products/{product}', [ProductAPIController::class, 'deleteProduct'])->name('products.destroy');

Route::get('employees', [EmployeeAPIController::class, 'getAllEmployee'])->name('employees');
Route::post('employees', [EmployeeAPIController::class, 'storeEmployee'])->name('employees.store');
Route::get('employees/{employee}', [EmployeeAPIController::class, 'showEmployee'])->name('employees.show');
Route::put('employees/{employee}', [EmployeeAPIController::class, 'updateEmployee'])->name('employees.update');
Route::delete('employees/{employee}', [EmployeeAPIController::class, 'deleteEmployee'])->name('employees.destroy');
