<?php

Route::get('/', 'SiteController@index');
Route::get('/filmess', 'SiteController@filmes');
Route::post('/pesquisar', 'SiteController@pesquisar')->name('pesquisar');
Route::get('/filme/{filme}', 'SiteController@filmeunico');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('listas', 'ListaController');
Route::get('/addlista', 'FilmeListaController@index')->name('addlista');
Route::post('/addlista', 'FilmeListaController@store')->name('addlista');
Route::post('/deletefilme', 'FilmeListaController@deletefilme')->name('deletefilme');
Route::post('/addnota', 'NotaController@store')->name('addnota');
Route::post('/addcomentario', 'ComentarioController@store')->name('addcomentario');


Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', 'AdminController@login');
    Route::post('/login', 'AdminController@postLogin');
    Route::get('/logout', 'AdminController@logout');

});

Route::group(['middleware' => 'auth:admin'], function() {

    

        Route::resource('slides', 'SlideController');
        Route::resource('generos', 'GeneroController');
        Route::resource('filmes', 'FilmeController');



});