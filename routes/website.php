<?php
use Harimayco\Menu\Facades\Menu;

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


    Route::get('/archive', 'FrontendController@archive');
    Route::get('/news/getdistrict/{division_id}', 'FrontendController@getdistrict');
    Route::get('/news/getsubdistrict/{district_id}', 'FrontendController@getsubdistrict');

    Route::get('/division', 'FrontendController@division');

    Route::get('/division', 'FrontendController@division');
    Route::get('/videodetails/{slug}/{id}', 'FrontendController@videodetails');
    
});

