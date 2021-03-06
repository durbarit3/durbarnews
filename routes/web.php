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

        //Ajax Route
        Route::get('edit/{districtId}', 'DistrictController@getDistrictByAjax');
    });

    Route::group(['prefix' => 'sub_district'], function () {
        Route::get('/', 'SubDistrictController@index')->name('admin.division.sub_district.index');
        Route::post('store', 'SubDistrictController@store')->name('admin.division.sub_district.store');
        Route::patch('update/{subDistrictId}', 'SubDistrictController@update')->name('admin.division.sub_district.update');
        Route::get('change/status/{subDistrictId}', 'SubDistrictController@changeStatus')->name('admin.division.sub_district.status.update');
        Route::get('delete/{subDistrictId}', 'SubDistrictController@delete')->name('admin.division.sub_district.delete');
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


Route::namespace('Admin')->prefix('admin/category')->group(function(){
    Route::get(md5('/all'),'CategoryController@index')->name('admin.category.all');
    Route::post(md5('/insert/submit'),'CategoryController@store')->name('admin.category.submit');
    Route::get('/active/{id}','CategoryController@active');
    Route::get('/deactive/{id}','CategoryController@deactive');
    Route::get('/delete/{id}','CategoryController@delete');
    Route::post('/update','CategoryController@update');
    Route::get('/edit/{id}','CategoryController@edit');
    Route::post('/multiDelete','CategoryController@multiDelete')->name('admin.category.multiDelete');
});

Route::namespace('Admin')->prefix('admin/subcategory')->group(function(){

    Route::get(md5('/all'),'SubCategoryController@index')->name('admin.subcategory.all');
    Route::post(md5('/insert'),'SubCategoryController@store')->name('admin.subcategory.insert');
    Route::get('/active/{id}','SubCategoryController@active');
    Route::get('/deactive/{id}','SubCategoryController@deactive');
    Route::get('/delete/{id}','SubCategoryController@delete');
    Route::post('/multidelete','SubCategoryController@multidelete')->name('admin.subcategory.multidelete');
    Route::get('/edit/{id}','SubCategoryController@edit');
    Route::post('/update','SubCategoryController@update');

});


Route::namespace('Admin')->prefix('admin/poll')->group(function(){

    Route::get(md5('/all'),'PollController@index')->name('admin.poll.all');
    Route::post(md5('/insert'),'PollController@store')->name('admin.poll.submit');
    Route::get('/deactive/{id}','PollController@deactive');
    Route::get('/active/{id}','PollController@active');
    Route::get('/delete/{id}','PollController@delete');
    Route::post('/multiDelete','PollController@multiDelete')->name('admin.poll.multiDelete');
    Route::get(md5('/pollresult'),'PollController@pollresult')->name('admin.poll.result');

});
// newspost
Route::namespace('Admin')->prefix('admin/news')->group(function(){
    Route::get(md5('/all'),'NewsPostController@index')->name('admin.news.all');
    Route::get(md5('/add'),'NewsPostController@create')->name('admin.news.create');
    Route::get('/getsubcate/{cate_id}','NewsPostController@getsubcate');
    Route::get('/getdistrict/{division_id}','NewsPostController@getdistrict');
    Route::get('/getsubdistrict/{district_id}','NewsPostController@getsubdistrict');
    Route::post('/insert','NewsPostController@store')->name('admin.newspost.submit');

    Route::get('/edit/{id}','NewsPostController@edit');
    Route::post('/update/{id}','NewsPostController@update')->name('admin.news.update');
    Route::get('/deletedpost','NewsPostController@deletedpost')->name('admin.news.deletedpost');
    Route::get('/deactive/{id}','NewsPostController@deactive');

    Route::get('/active/{id}','NewsPostController@active');
    Route::get('/softdelete/{id}','NewsPostController@softdelete');
    Route::post('/multisoftdelete','NewsPostController@multisoftdelete')->name('admin.news.multisoftdelete');
    Route::get('/delete/{id}','NewsPostController@delete');
    Route::get('/recycle/{id}','NewsPostController@recycle');
    Route::post('/multihearddelete','NewsPostController@multihearddelete')->name('admin.news.multihearddelete');
});

// section managae
Route::namespace('Admin')->prefix('admin/sectionmanage')->group(function(){
    Route::get(md5('/all'),'SectionManageController@index')->name('admin.sectionmanage.all');
    Route::get('/deactive/{id}','SectionManageController@deactive');
    Route::get('/active/{id}','SectionManageController@active');


});







Route::namespace('Admin')->prefix('admin/advertisement')->group(function(){

    Route::get(md5('/all'),'AdvertisementController@index')->name('admin.advertisement.all');
    Route::get(md5('/create'),'AdvertisementController@create')->name('admin.advertisement.create');
    Route::post(md5('/submit'),'AdvertisementController@store')->name('admin.advertisement.submit');
    Route::get('/deactive/{id}','AdvertisementController@deactive');
    Route::get('/active/{id}','AdvertisementController@active');
    Route::get('/softdelete/{id}','AdvertisementController@softdelete');
    Route::post('/multisoftdel','AdvertisementController@multisoftdel');
    Route::get('/deletead','AdvertisementController@deletead')->name('admin.advertisement.deletead');
    Route::get('/edit/{id}','AdvertisementController@edit');
    Route::post('/update/{id}','AdvertisementController@update')->name('admin.advertisement.update');
    Route::get('/restore/{id}','AdvertisementController@restore');
    Route::get('/delete/{id}','AdvertisementController@delete');
    Route::post('/heardmulti/delete','AdvertisementController@heardmultidelete')->name('admin.advertisement.hearddelete');

    Route::get(md5('/position/all'),'AdvertisementController@addposition')->name('admin.adposition.all');
    Route::post(md5('/position/submit'),'AdvertisementController@addpositioninsert')->name('admin.adposition.submit');
    Route::get('/position/edit/{id}','AdvertisementController@addpositionedit');
    Route::post('/position/update','AdvertisementController@updateposition')->name('admin.adposition.update');
    Route::get('/position/delete/{id}','AdvertisementController@postiondelete');

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

Route::namespace('Admin')->prefix('admin/logo')->group(function(){
    Route::get('/','FooterController@logoIndex')->name('admin.logo.index');
    Route::post('/store','FooterController@logoStore')->name('admin.logo.store');
});


Route::namespace('Admin')->prefix('admin/our/say')->group(function(){
    Route::get('/','FooterController@ourSayIndex')->name('admin.Oursay.index');
    Route::post('/store','FooterController@ourSayStore')->name('admin.our.say.store');
});

Route::group(['prefix' => 'admin/galleries', 'namespace' => 'Admin'], function () {
    Route::get('/', 'GalleryController@index')->name('admin.gallery.index');
    Route::get('create', 'GalleryController@create')->name('admin.gallery.create');
    Route::post('store', 'GalleryController@store')->name('admin.gallery.store');
    Route::post('update/{galleryId}', 'GalleryController@update')->name('admin.gallery.update');
    Route::get('edit/{galleryId}', 'GalleryController@edit')->name('admin.gallery.edit');
    Route::get('change/status/{galleryId}', 'GalleryController@changeStatus')->name('admin.gallery.status.update');

    // Trash Route

    Route::get('trash/all', 'GalleryController@trashAll')->name('admin.gallery.trash.all');
    Route::get('soft/delete/{galleryId}', 'GalleryController@softDelete')->name('admin.gallery.soft.delete');
    Route::get('hard/delete/{galleryId}', 'GalleryController@hardDelete')->name('admin.gallery.trash.hard.delete');
    Route::get('refactor/{galleryId}', 'GalleryController@refactor')->name('admin.gallery.trash.refactor');
    Route::post('multiple/action', 'GalleryController@multipleAction')->name('admin.gallery.trash.multiple.action');

    // Ajax route
    Route::get('gallery/photo/delete/{galleryPhotoId}', 'GalleryController@galleryPhotoDeleteByAjax');
});

Route::namespace('Admin')->prefix('admin/team')->group(function(){
    Route::get('/', 'TeamController@teamIndex')->name('admin.team.index');
    Route::post('/store', 'TeamController@teamStore')->name('admin.team.create');
    Route::get('/edit/{id}', 'TeamController@teamEdit');
    Route::get('/delete/{id}', 'TeamController@teamDelete')->name('admin.team.delete');
    Route::patch('/update', 'TeamController@teamUpdate')->name('admin.team.update');
    Route::get('/status/{id}', 'TeamController@teamStatus')->name('admin.team.status');
    Route::post('/multi/delete', 'TeamController@teamMultiDelete')->name('admin.team.multi.delete');
});

Route::namespace('Admin')->prefix('admin/user')->group(function(){
    Route::get('/', 'UserController@userIndex')->name('admin.user.index');
    Route::get('/create', 'UserController@userCreate')->name('admin.user.create');
    Route::post('/store', 'UserController@userStore')->name('admin.user.store');
    Route::get('/edit/{id}', 'UserController@userEdit')->name('admin.user.edit');
    Route::post(md5('/update'), 'UserController@userUpdate')->name('admin.user.update');
    Route::get('/delete/{id}', 'UserController@userDelete')->name('admin.user.delete');
    Route::get('/status/update/{id}', 'UserController@userStatusUpdate')->name('admin.user.status.update');
});






Auth::routes();

