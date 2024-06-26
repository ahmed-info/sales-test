<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[DepartmentController::class, 'index']);
Route::get('content',[DepartmentController::class, 'dashboard'])->name('content');
Route::get('department/list',[DepartmentController::class, 'list'])->name('department.list');
Route::get('department/create',[DepartmentController::class, 'create'])->name('department.create');
Route::post('department/store',[DepartmentController::class, 'store'])->name('department.store');
Route::get('department/edit/{department}',[DepartmentController::class, 'edit'])->name('department.edit');
Route::put('department/update/{id}',[DepartmentController::class, 'update'])->name('department.update');
Route::delete('department/delete/{id}',[DepartmentController::class, 'destroy'])->name('department.delete');
Route::get('subdepartment/list/{id}',[DepartmentController::class, 'sublist'])->name('subdepart.list');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
