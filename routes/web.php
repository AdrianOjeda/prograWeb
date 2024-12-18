<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FormularioClasesController;
use App\Http\Controllers\ProfesoresController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('auth.register');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'redirect.dashboard',
])->group(function () {
    Route::get('/dashboard', function () {
        
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

Route::get('/alumno/dashboard', [AlumnosController::class, 'dashboard'])->name('alumno.dashboard');


Route::get('/default/dashboard', function () {
    return view('dashboards.default');
})->name('default.dashboard');

Route::post('/alumno/register-class/{id}', [AlumnosController::class, 'registerClass'])->name('alumno.registerClass');

Route::get('/alumno/mis-clases', [AlumnosController::class, 'misClases'])->name('alumno.misClases');
Route::post('/alumno/clases/{classId}/unregister', [AlumnosController::class, 'unregisterClass'])->name('alumno.unregisterClass');

Route::get('/profesor/mis-clases', [ProfesoresController::class, 'misClases'])->name('profesor.misClases');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/profesor/clases/{id}', [ProfesoresController::class, 'detalleClase'])->name('profesor.detalleClase');

Route::get('/clases/{id}/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/clases/{id}/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/clases/{id}/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/clases/{id}/posts', [PostController::class, 'storePost'])->name('posts.store');
Route::get('/mis-clases/{id}', [AlumnosController::class, 'showClassDetails'])->name('alumno.classDetails');
Route::get('/alumno/search', [AlumnosController::class, 'search'])->name('alumno.search');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
