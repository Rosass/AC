<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes(
    [
        'register'=>false,
        'reset'=>false,
        'verify'=>false,
        'confirm'=>false,
    ]
);

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::resource('/jefe', 'JefeController');
Route::resource('/usuario', 'UsuarioController');
Route::resource('/area', 'AreaController');
Route::resource('/tipo_usuario', 'TipoUsuarioController');

Route::get('/div-est-profesionales', 'DepController@index')->name('dep');
Route::resource('/periodo', 'PeriodoController');
Route::resource('/actividad', 'ActividadController');
