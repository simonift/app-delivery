<?php

Route::get('/', 'Testcontroller@welcome'); //Muestra Vista Welcome

Auth::routes();

Route::get('/search', 'SearchController@show'); // Muestra busqueda
Route::get('/products/json', 'SearchController@data'); // Json productos

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::post('/cart', 'CartDetailController@store'); // Muestra productos carrito de compras
Route::delete('/cart', 'CartDetailController@destroy'); // Elimina productos del carrito de compras

Route::post('/order', 'CartController@update'); // Ruta para confirmar orden

Route::middleware(['auth'],['admin'])->prefix('admin')->namespace('Admin')->group(function () {
        // Rutas para productos ADM
        Route::get('/products','ProductController@index'); // listado Productos
        Route::get('/products/create','ProductController@create'); // formulario Productos
        Route::post('/products','ProductController@store'); // registrar Productos

        Route::get('products/{id}/edit','ProductController@edit'); // formulario edicion de Productos
        Route::post('products/{id}/edit','ProductController@update'); // actualización de Productos
        Route::delete('products/{id}','ProductController@destroy'); // formulario eliminación de Productos

        Route::get('/products/{id}/images', 'ImageController@index'); //listado
        Route::post('/products/{id}/images','ImageController@store'); // registrar
        Route::delete('products/{id}/images','ImageController@destroy'); // form eliminar
        Route::get('products/{id}/images/select/{image}','ImageController@select'); // destacar

        // Rutas para Categorías de productos
        Route::get('/categories', 'CategoryController@index'); // listado de categorías
	Route::get('/categories/create', 'CategoryController@create'); // formulario creación categorías
        Route::post('/categories', 'CategoryController@store'); // registro categorías
        
	Route::get('/categories/{category}/edit', 'CategoryController@edit'); // formulario edición de Categorías
	Route::post('/categories/{category}/edit', 'CategoryController@update'); // actualización de Categorías en BD
	Route::delete('/categories/{category}', 'CategoryController@destroy'); // formulario eliminación de Categorías
});