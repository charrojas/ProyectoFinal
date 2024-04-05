<?php

use App\Http\Controllers\Auth\ControllerGoogle;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerPagina;
use App\Http\Controllers\ControllerVehiculo;
use App\Http\Controllers\ControllerImagenes;
use App\Http\Controllers\ControllerPerfil;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
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

// Route::get('/', function () {
//     return view('app');
// });

//Ruta para ir a la pagina de contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::resource('/paginas', ControllerPagina::class);

Route::resource('/imagenes', ControllerImagenes::class)->middleware('auth');

//Rutas para vehiculo
// Ruta para mostrar la lista de vehículos sin autenticación
Route::get('/vehiculos/misVehiculos', [ControllerVehiculo::class, 'misVehiculos'])->name('vehiculos.misVehiculos');
Route::get('/vehiculos/misFavoritos', [ControllerVehiculo::class, 'misFavoritos'])->name('vehiculos.misFavoritos');


Route::post('/vehiculos/{vehiculo}/favoritos/agregar', [ControllerVehiculo::class, 'agregarFavorito'])->name('vehiculos.favoritos.agregar');
Route::delete('/vehiculos/favoritos/{vehiculo}', [ControllerVehiculo::class, 'destroyFavorito'])->name('vehiculos.favoritos.eliminar');


Route::get('/vehiculos/marcar-vendido/{id}', [ControllerVehiculo::class, 'marcarVendido'])->name('vehiculos.marcar-vendido');
// Rutas RESTful para los vehículos
Route::resource('/vehiculos', ControllerVehiculo::class);




Route::get('/', function () {
    return view('paginas.index');
})->name('inicio'); //RUTA PARA DESPUÉS DE INICIAR SESIÓN NORMALITA

Auth::routes();

// Google login
Route::get('login/{driver}', [LoginController::class, 'redirectToProvider'])->name('login.provider');
Route::get('login/{driver}/callback', [LoginController::class, 'handleProviderCallback']);
// Ruta de cierre de sesión

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::get('/register-create', [RegisterController::class, 'create'])->name('register-create');

Route::post('/registro', [RegisterController::class, 'create'])->name('registro.create');

// Route::post('/holi', [LoginController::class, 'dataExtra2'])->name('holi.dataExtra2');

Route::post('/guardar-informacion', [DatosController::class, 'guardarInformacion'])->name('guardar.informacion');

// Route::resource('perfil', ControllerPerfil::class);

Route::resource('perfil', ControllerPerfil::class);

// Route::post('/enviar-correo', [CorreoController::class, 'enviarCorreo'])->name('enviar.correo');


// Route::get('/email/verify/{token}', [VerificationController::class, 'verify'])->name('verification.verify');


//Route::get('/editUser{id}', [ControllerPerfil::class, 'editP'])->name('edit.user');

//Route::put('/updateUser/{id}', [ControllerPerfil::class, 'updateP'])->name('updateUser');
// Route::get('/enviarCorreo', [CorreoController::class, 'index'])->name('enviarCorreo');

// Route::post('/enviar-formulario', 'FormularioController@enviarFormulario')->name('formulario.enviar');

// routes/web.php
// Route::get('/contacto', 'ContactController@showContactForm')->name('contacto');

Route::post('/contacto',  [CorreoController::class, 'enviarCorreo'])->name('enviar_correo');



Route::post('/buscar', [ControllerVehiculo::class, 'buscar'])->name('buscar');

// Route::post('/enviar-correo', [CorreoController::class, 'correoFicha'])->name('enviarCorreo');
// routes/web.php o routes/api.php

// Route::post('/enviarCorreoPropietario', [CorreoController::class, 'enviarCorreoPropietario'])->name('enviarCorreoPropietario');


Route::get('/vehiculos/{id}/enviar-correo', [CorreoController::class, 'mostrarEnviarCorreo'])->name('vehiculos.enviarCorreo');
Route::post('/vehiculos/enviar-correo-prop', [CorreoController::class, 'enviarCorreoPropietario'])->name('enviarCorreoPropietario');
