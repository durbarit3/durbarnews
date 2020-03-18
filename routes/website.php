<?php

Route::namespace('Website')->group(function(){
    
    Route::get('/', 'FrontendController@index');
    

});