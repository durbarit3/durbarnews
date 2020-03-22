<?php

use App\Logo;
use App\OurSay;
use App\Page;
use App\Unique;
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






Route::namespace('Website')->group(function(){ 
    Route::get('/', 'FrontendController@index');

    Route::get('/categores', 'FrontendController@allCategory')->name('categores');
    Route::get('/{slug}', 'FrontendController@category');
    Route::get('/{cat}/{subcat}', 'FrontendController@subcategory');
    Route::get('/details/{slug}/{id}', 'FrontendController@detailsNews');
    Route::get('/site/pages/{slug}', 'FrontendController@pageDetails');
});

View::composer(['*'],function($view){
    $public_menu = Menu::getByName('Main Menu');
    $oursay =OurSay::first();
    $logo = Logo::select('frontlogo')->first();
    $socials = Unique::where('key','social')->first();
    $pages = Page::where('deleted_at',NULL)->get();
    // $view->with('public_menu',$public_menu)->with('oursay',$oursay);
    $view->with([
        'public_menu'=>$public_menu,
        'oursay'=>$oursay,
        'logo'=>$logo,
        'social'=>$socials,
        'pages'=>$pages,
    ]);
});




