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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('add-to-log', 'HomeController@myTestAddToLog');

// Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function (){
//     Route::get('/', function(){
//         return view('admin.index');
//     });
// });

Route::group(['prefix'=>'admin','middleware'=>'auth'],
function (){
    Route::get('/', function(){
        return view('backend.index');
    });
    Route::resource('kategori', 'KategoriController');
    Route::resource('logActivity', 'LogActivityController');
});
