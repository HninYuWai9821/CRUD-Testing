<?php
use App\Models\Category;
use App\Models\Specialty;
use App\Models\StaffType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Web\EmployeeTypeController;
use App\Http\Controllers\Web\EmployeeController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\StaffTypeController;
use App\Models\EmployeeType;

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
    return view('welcome');
});

// Route::resource('posts', PostController::class)->names('posts');

//listing
Route::get('posts', [PostController::class, 'index'])->name('posts.index');

//create
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');    //ui
Route::post('posts', [PostController::class, 'store'])->name('posts.store');            //form submit

//edit
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');   //ui
Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');    //form submit
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

//delete
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



// Category list



// Create and store categories
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');


Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

//edit
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');   //ui
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');    //form submit
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

//delete
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::resource('products', ProductController::class)->names('products');


Route::resource('specialties', SpecialtyController::class)->names('specialties');


Route::resource('stafftypes', StaffTypeController::class)->names('stafftypes');

// Route::resource('employees', StaffController::class)->names('staffs');

Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');

Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');

Route::get('employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');

Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Route::put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

Route::delete('employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


// Employee Service

Route::get('employeeTypes', [EmployeeTypeController::class, 'index'])->name('employeeTypes.index');

Route::get('employeeTypes/create', [EmployeeTypeController::class, 'create'])->name('employeeTypes.create');

Route::get('employeeTypes/{employeeType}',[EmployeeTypeController::class, 'show'])->name('employeeTypes.show');

Route::post('employeeTypes/',[EmployeeTypeController::class, 'store'])->name('employeeTypes.store');

Route::get('employeeTypes/{employeeType}/edit',[EmployeeTypeController::class, 'edit'])->name('employeeTypes.edit');

Route::put('employeeTypes/{employeeType}',[EmployeeTypeController::class, 'update'])->name('employeeTypes.update');

Route::delete('employeeTypes/{employeeType}',[EmployeeTypeController::class, 'destroy'])->name('employeeTypes.destroy');





