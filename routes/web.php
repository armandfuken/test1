<?php

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

Route::get('/', 'PagesController@Index');

Route::get('blog', 'PagesController@blog')->name('blogs');
Route::get('galeria','PagesController@galeria')->name('galeria');    //NOMBRES PARA QUE LOS IDENTIFIQUE EN LA PLANTILLA {{route(name)}}

Route::get('nosotros/{nombre?}','PagesController@nosotros')->name('nosotros');


Route::get('cami/{casa}', function ($par) {
    return "O".$par;
})->where('casa', '[0-9]+');

//Route::view('galeria','fotos',['id'=>12]);
