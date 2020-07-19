<?php

Route::get('/', 'Testcontroller@welcome');

Route::get('/prueba', function (){
    return 'Hola soy una ruta de prueba';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
