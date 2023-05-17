<?php

use App\Http\Controllers\TaskController;
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
    return view('dashboard');
});

Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/task/{id}/update', [TaskController::class, 'update'])->name('task.update');
Route::get('/task/{id}/show', [TaskController::class, 'show'])->name('task.show');
Route::get('/task/{id}/delete', [TaskController::class, 'delete'])->name('task.delete');

