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

Route::get('/', function () {
    $footer_menu = Menu::getByName('Footer');
    $public_menu = Menu::getByName('Public');
    return view('welcome', compact('public_menu', 'footer_menu'));
});


Route::namespace('Admin')->prefix('admin')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthController@login')->name('admin.login.submit');
    Route::get('/logout', 'AuthController@logout')->name('admin.logout');

    Route::get('/register', 'AuthController@showRegistationPage');
    Route::post('/register', 'AuthController@register')->name('admin.register');
});

// Menu area start

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/menu', 'AdminController@menuSetting')->name('admin.menu.setting');
    Route::get('/url/setting', 'AdminController@urlSetting')->name('admin.url.setting');
    Route::get('/get/url/name/{id}', 'AdminController@getUrlName');
});

Route::namespace('Admin')->prefix('admin/page')->group(function () {
    Route::get(md5('/list'), 'PageController@index')->name('admin.page.list');
    Route::get(md5('/create'), 'PageController@create')->name('admin.page.create');
    Route::post(md5('/store'), 'PageController@store')->name('admin.page.store');
    Route::get('/show/{id}', 'PageController@show')->name('admin.page.show');
    Route::get('/edit/{id}', 'PageController@edit')->name('admin.page.edit');
    Route::post('/update/{id}', 'PageController@update')->name('admin.page.update');
    Route::get('/delete/{id}', 'PageController@destroy')->name('admin.page.delete');
    Route::post('/multi/delete', 'PageController@multiDelete')->name('admin.page.multi.delete');
});


// Division Section All Routes
Route::group(['prefix' => 'admin/division', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DivisionController@index')->name('admin.division.index');

    Route::group(['prefix' => 'district'], function () {
        Route::get('/', 'DistrictController@index')->name('admin.division.district');
        Route::post('store', 'DistrictController@store')->name('admin.division.district.store');
        Route::get('change/status/{districtId}', 'DistrictController@statusChange')->name('admin.division.district.status.update');
        Route::get('delete/{districtId}', 'DistrictController@delete')->name('admin.division.district.delete');
        Route::post('multiple/delete', 'DistrictController@multipleDelete')->name('admin.division.district.multiple.delete');
        Route::patch('update/{districtId}', 'DistrictController@update')->name('admin.division.district.update');

        Route::get('edit/{districtId}', 'DistrictController@getDistrictByAjax');
    });

    Route::group(['prefix' => 'sub_district'], function () {
        Route::get('/', 'SubDistrictController@index')->name('admin.division.sub_district.index');
        Route::post('store', 'SubDistrictController@store')->name('admin.division.sub_district.store');
        Route::patch('update/{subDistrictId}', 'SubDistrictController@update')->name('admin.division.sub_district.update');
        Route::get('change/status/{subDistrictId}', 'SubDistrictController@changeStatus')->name('admin.division.sub_district.status.update');
        Route::get('delete/{subDistrictId}', 'SubDistrictController@delete')->name('admin.division.sub_district.delete');
        Route::post('multiple/delete', 'SubDistrictController@multipleDelete')->name('admin.division.sub_district.multiple.delete');

        // Ajax Route
        Route::get('get/district/by/division_id/{divisionId}', 'SubDistrictController@getDistrictByDivisionId');
        Route::get('edit/{divisionId}', 'SubDistrictController@getSubDistrictByAjax');

    });
});
// Division Section All Routes End

Route::group(['prefix' => 'admin/setting/theme/colors', 'namespace' => 'Admin'], function () {
   Route::get('/', 'ThemeColorController@index')->name('admin.theme.color.index');
   Route::post('store', 'ThemeColorController@store')->name('admin.setting.theme.color.store');
   Route::post('multiple/action', 'ThemeColorController@multipleAction')->name('admin.setting.theme.color.multiple.action');
   Route::get('change/status/{themeColorId}', 'ThemeColorController@changeStatus')->name('admin.setting.theme.color.status.update');
   Route::patch('update/{themeColorId}', 'ThemeColorController@update')->name('admin.setting.theme.color.update');

   Route::get('delete/{themeColorId}', 'ThemeColorController@delete')->name('admin.setting.theme.color.delete');

   // Ajax Route
   Route::get('edit/{themeColorId}', 'ThemeColorController@getThemeColorByAjax');
});


Auth::routes();
