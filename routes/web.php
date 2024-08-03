<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store']) ->name('category.store');
Route::get('/category{idCategory}', [CategoryController::class, 'view']) ->name('category.view');
Route::post('/category/update',[CategoryController::class, 'update']) ->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete']) ->name('category.delete');


Route::get('/', [PeopleController::class, 'index'])->name('people.index');
Route::get('/people', [PeopleController::class, 'create'])->name('people.create');
Route::post('/people', [PeopleController::class, 'store']) ->name('people.store');
Route::get('/people{idPeople}', [PeopleController::class, 'view']) ->name('people.view');
Route::post('/people/update',[PeopleController::class, 'update']) ->name('people.update');
Route::get('/peoplery/delete/{id}', [PeopleController::class, 'delete']) ->name('people.delete');
