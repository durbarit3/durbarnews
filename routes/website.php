<?php

Route::namespace('Website')->group(function(){
    
    Route::get('/', 'FrontendController@index');
    Route::get('/archive', 'FrontendController@archive');
    Route::get('/news/getdistrict/{division_id}', 'FrontendController@getdistrict');
    Route::get('/news/getsubdistrict/{district_id}', 'FrontendController@getsubdistrict');

    Route::get('/division', 'FrontendController@division');

    Route::get('/division', 'FrontendController@division');
    Route::get('/videodetails/{slug}/{id}', 'FrontendController@videodetails');
    
});