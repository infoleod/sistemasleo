<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|    <!-- <input id="image" class="form-control" type="file" name="image"> -->
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Ruta Home, Tiene que estar logueado
Route::get('/profile', 'HomeController@index')->name('profile');
Route::get('profile-edit', 'HomeController@edit')->name('profile-edit');
Route::post('/profile-update', 'HomeController@update')->name('profile-update');
Route::get('/product-list', 'HomeController@product')->name('product-list');

// Creamos una ruta de tipo RESOURCE para los productos
Route::resource('/products', 'ProductController');

// Agregamos la ruta para el producto-categoria, al cual le pasamos el campo Slug, y lo llamamos con un Alias al final
Route::get('product/category/{slug}', 'ProductController@byCategory')->name('category-product');
Route::get('product-search/{titleSearch}', 'ProductController@titleSearch')->name('product-search');

// Agregamos la ruta para el producto-categoria, al cual le pasamos el campo Slug, y lo llamamos con un Alias al final
Route::get('product/show/{id}', 'ItemController@show')->name('show-product');

// Agregamos la ruta para el producto-categoria, al cual le pasamos el campo Slug, y lo llamamos con un Alias al final
Route::get('product-create/', 'ItemController@create');
Route::get('product-edit/{id}', 'ItemController@edit')->name('edit-product');
Route::get('product-destroy/{productId},{idUser}', 'ItemController@destroy')->name('product-destroy');
Route::post('product-update/{id}', 'ItemController@update');
Route::post('product-store/', 'ItemController@store');

//Se crea la ruta directa a la vista de Preguntas Frecuentes
Route::get('/faq', function () {
    return view('faq/faq');
});

//Cambiar Contraseña
Route::get('change-pass-show', 'UserController@showChangePass')->name('change-pass-show');
Route::post('/change-pass-change' , 'UserController@UpdateChangePass')->name('change-pass-change');
