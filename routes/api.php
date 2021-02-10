<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('autores', 'App\Http\Controllers\AutorController@getAllAutores');
Route::get('autores/{id}', 'App\Http\Controllers\AutorController@getAutor');
Route::post('autores', 'App\Http\Controllers\AutorController@createAutor');
Route::put('autores/{id}', 'App\Http\Controllers\AutorController@updateAutor');
Route::delete('autores/{id}','App\Http\Controllers\AutorController@deleteAutor');

Route::get('libros', 'App\Http\Controllers\LibroController@getAllLibros');
Route::get('libros/{id}', 'App\Http\Controllers\LibroController@getLibro');
Route::post('libros', 'App\Http\Controllers\LibroController@createLibro');
Route::put('libros/{id}', 'App\Http\Controllers\LibroController@updateLibro');
Route::delete('libros/{id}','App\Http\Controllers\LibroController@deleteLibro');
