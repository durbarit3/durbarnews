<?php
use Harimayco\Menu\Facades\Menu;

Route::group(['prefix' => 'archive', 'namespace' => 'Website' ], function () {
    Route::get('/', 'ArchiveController@index')->name('website.archive.index');
    Route::get('archive/search', 'ArchiveController@archiveSearch')->name('website.archive.search');
    // Ajax route
    route::get('get/districts/by/division/id/{divisionId}','ArchiveController@getDistrictByDivisionIdByAjax');
    route::get('get/sub_districts/by/district/id/{districtId}','ArchiveController@getSubDistrictByDistrictIdByAjax');
});

Route::group(['prefix' => 'photo_gallery', 'namespace' => 'Website' ], function () {
    Route::get('/', 'PhotoGalleryController@index')->name('website.photo.gallery.index');
    Route::get('details/{slug}', 'PhotoGalleryController@details')->name('website.gallery.details');
});


Route::group(['prefix' => 'search', 'namespace'=> 'Website'], function () {
    Route::get('/keyword', 'SearchController@keyWordSearch')->name('website.keyword.search');
    Route::get('/place/wise', 'SearchController@searchPlaceWise')->name('website.search.place.wise');
});




Route::namespace('Website')->group(function(){
    Route::get('/', 'FrontendController@index');
    Route::get('/categores', 'FrontendController@allCategory')->name('categores');
    Route::get('/{slug}', 'FrontendController@category');
    Route::get('/{cat}/{subcat}', 'FrontendController@subcategory');
    Route::get('/details/{slug}/{id}', 'FrontendController@detailsNews');

});

View::composer(['*'],function($view){
    $public_menu = Menu::getByName('Public');
    $view->with('public_menu',$public_menu);
});


Route::namespace('Website')->group(function(){
    
    Route::get('/news/getdistrict/{division_id}', 'FrontendController@getdistrict');
    Route::get('/news/getsubdistrict/{district_id}', 'FrontendController@getsubdistrict');
    Route::get('/district/news/map', 'FrontendController@map');
    Route::get('district/news/map/news/{id}', 'FrontendController@mapnews');
    Route::get('subdistrict/news/map/news/{id}', 'FrontendController@subdisnews');
    Route::get('/videodetails/{slug}/{id}', 'FrontendController@videodetails');
    Route::get('/newsportal/ourteam/team', 'FrontendController@ourteam');
    Route::get('newsportal/ourteam/teammember/{id}', 'FrontendController@ourteamprofice');
   

    Route::get('/news/getdistrict/{division_id}', 'FrontendController@getdistrict');
    Route::get('/news/getsubdistrict/{district_id}', 'FrontendController@getsubdistrict');
    Route::get('/division', 'FrontendController@division');
    Route::get('/division', 'FrontendController@division');
    Route::get('/videodetails/{slug}/{id}', 'FrontendController@videodetails');


});
