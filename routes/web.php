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

Route::namespace('Admin')->prefix('admin')->group(function(){

    Route::get(md5('/contact/information'),'FooterController@contactInformation')->name('admin.contact.info');
    Route::post(md5('/contact/information/update'),'FooterController@contactInformationupdate')->name('admin.contact.info.update');
    Route::get(md5('/seo/setting'),'FooterController@seoSetting')->name('admin.seo.setting');
    Route::post(md5('/seo/setting/update'),'FooterController@seoSettingUpdate')->name('admin.seo.update');
    Route::get(md5('/social/setting'),'FooterController@socialSetting')->name('admin.social.setting');
    Route::post(md5('/social/setting/update'),'FooterController@socialSettingUpdate')->name('admin.social.update');
});

Route::namespace('Admin')->prefix('admin/notice')->group(function(){
    Route::get(md5('/'),'NoticeController@noticeIndex')->name('admin.notice.index');
    Route::post(md5('/store'),'NoticeController@noticeStore')->name('admin.notice.store');
    Route::get('/edit/{id}','NoticeController@noticeEdit');
    Route::post(md5('/update'),'NoticeController@noticeUpdate')->name('admin.notice.update');
    Route::post(md5('/multi/delete'),'NoticeController@noticeMultiDelete')->name('admin.notice.multi.delete');
    Route::get('/update/status/{id}','NoticeController@noticeStatusUpdate')->name('admin.notice.status.update');
    Route::get('/delete/{id}','NoticeController@noticeDelete')->name('admin.notice.delete');
});





Auth::routes();