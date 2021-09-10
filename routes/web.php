<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\MailController;




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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| ADMIN - USUARIOS
|--------------------------------------------------------------------------
*/

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/crear', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::get('/usuarios/show/{id}', [UsuariosController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/getUsers', [UsuariosController::class, 'getUsers'])->name('usuarios.getUsers');
Route::get('/usuarios/search', [UsuariosController::class, 'search'])->name('usuarios.search');
Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}/edit',[UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::patch('/usuarios/{usuario}',[UsuariosController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}',[UsuariosController::class, 'destroy'])->name('usuarios.destroy');


/*
|--------------------------------------------------------------------------
| ADMIN / USER - MAILS
|--------------------------------------------------------------------------
*/

Route::get('/mail', [MailController::class, 'index'])->name('mail.index');
Route::get('/mail/crear', [MailController::class, 'create'])->name('mail.create');
Route::post('/mail/store', [MailController::class, 'store'])->name('mail.store');