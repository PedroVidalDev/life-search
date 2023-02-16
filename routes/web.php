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

use App\Http\Controllers\LifeController;

Route::get('/', [LifeController::class, 'index']);

Route::get('/project/create', [LifeController::class, 'create'])->middleware('auth');

Route::post('/project', [LifeController::class, 'store']);

Route::get('/projects', [LifeController::class, 'projects']);

Route::get('/projects/show/{id}', [LifeController::class, 'show']);

Route::post('/projects/show/{id}/comment', [LifeController::class, 'comment'])->middleware('auth');

Route::delete('/projects/delete/{id}', [LifeController::class, 'delete'])->middleware('auth');

Route::get('/projects/edit/{id}', [LifeController::class, 'edit'])->middleware('auth');

Route::put('/projects/update/{id}', [LifeController::class, 'update'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [LifeController::class, 'dashboard'])->middleware('auth');
});