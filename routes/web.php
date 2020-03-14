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



/*
|--------------------------------------------------------------------------
| Admin route start from here
|--------------------------------------------------------------------------
*/

use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Harimayco\Menu\Facades\Menu;

Route::get('/',function(){
    $footer_menu = Menu::getByName('Footer');
    $public_menu = Menu::getByName('Public');
    return view('welcome',compact('public_menu','footer_menu'));
});


Route::namespace('Admin')->prefix('admin')->group(function () {
    
    Route::get('/','AdminController@index')->name('admin.home');
    Route::get('/login','AuthController@showLoginForm')->name('admin.login');
    Route::post('/login','AuthController@login')->name('admin.login.submit');
    Route::get('/logout','AuthController@logout')->name('admin.logout');

    Route::get('/register','AuthController@showRegistationPage');
    Route::post('/register','AuthController@register')->name('admin.register');
});

// Menu area start

Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::get('/menu','AdminController@menuSetting')->name('admin.menu.setting');
    Route::get('/url/setting','AdminController@urlSetting')->name('admin.url.setting');
    Route::get('/get/url/name/{id}','AdminController@getUrlName');
});

Route::namespace('Admin')->prefix('admin/page')->group(function(){
    Route::get(md5('/list'),'PageController@index')->name('admin.page.list');
    Route::get(md5('/create'),'PageController@create')->name('admin.page.create');
    Route::post(md5('/store'),'PageController@store')->name('admin.page.store');
    Route::get('/show/{id}','PageController@show')->name('admin.page.show');
    Route::get('/edit/{id}','PageController@edit')->name('admin.page.edit');
    Route::post('/update/{id}','PageController@update')->name('admin.page.update');
    Route::get('/delete/{id}','PageController@destroy')->name('admin.page.delete');
    Route::post('/multi/delete','PageController@multiDelete')->name('admin.page.multi.delete');
});

Auth::routes();