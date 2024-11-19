<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\SearchController;
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

Route::resource('alumnos', AlumnosController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('profesores', ProfesoresController::class)
        ->except(['index', 'show'])
        ->parameters(['profesores' => 'profesor']);
});

Route :: get( '/inicio', function( ) {
    return view( 'inicio' );
});


Route::get('/admin/dashboard', function () {
    return view('dashboards.admin');
})->name('admin.dashboard');

Route::get('/profesor/dashboard', function () {
    return view('dashboards.profesor');
})->name('profesor.dashboard');

Route::get('/alumno/dashboard', function () {
    return view('dashboards.alumno');
})->name('alumno.dashboard');

Route::get('/default/dashboard', function () {
    return view('dashboards.default');
})->name('default.dashboard');

Route::get('/search', [SearchController::class, 'search'])->name('search');


