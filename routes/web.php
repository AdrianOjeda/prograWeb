<?php

use App\Http\Controllers\FormularioClasesController;
use App\Http\Controllers\ProfesoresController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
})->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('clases', FormularioClasesController::class)->middleware('auth');

Route::resource('profesores', ProfesoresController::class)
    ->parameters(['profesores' => 'profesor']);

Route::middleware('auth')->group(function () {
    Route::resource('profesores', ProfesoresController::class)
        ->except(['index', 'show'])
        ->parameters(['profesores' => 'profesor']);
});

Route :: get( '/inicio', function( ) {
    return view( 'inicio' );
});