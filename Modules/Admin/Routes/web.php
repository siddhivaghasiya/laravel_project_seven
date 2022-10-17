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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
});


Route::get('/','Admincontroller@index')->name('admin');

Route::any('/save_tinymce_image', 'AdminController@saveTinymceImage')->name("save_tinymce_image");

// blog

Route::get('blog/view','BlogController@ajaxlisting')->name('blog.listing');

Route::resource('blog','BlogController');

//categories

Route::get('categories/view','CategoriesController@ajaxlisting')->name('categories.listing');

Route::resource('categories','CategoriesController');


//Tags
Route::get('tags/view','TagsController@ajaxlisting')->name('tags.listing');

Route::resource('tags','TagsController');

//banner
Route::get('banner/view','BannerController@ajaxlisting')->name('banner.listing');

Route::resource('banner','BannerController');

//email

Route::get('email/view','EmailController@ajaxlisting')->name('email.listing');

Route::resource('email','EmailController');

//social media

Route::get('social_media/view','Social_mediaController@ajaxlisting')->name('social.listing');

Route::resource('social_media','Social_mediaController');

//contact_us

Route::get('contact_us/view','Contact_usController@ajaxlisting')->name('contact.listing');

Route::resource('contact_us','Contact_usController');

//Newslater

Route::get('newslater/view','NewslaterController@ajaxlisting')->name('newslater.listing');

Route::resource('newslater','NewslaterController');

//cms

Route::get('cms/view','CmsController@ajaxlisting')->name('cms.listing');

Route::resource('cms','CmsController');

//modules

Route::get('modules/view','ModulesController@ajaxlisting')->name('modules.listing');

Route::resource('modules','ModulesController');

//setting

Route::get('setting/view','SettingController@ajaxlisting')->name('setting.listing');

Route::resource('setting','SettingController');

//web_traffic

Route::get('web_traffic/view','Web_trafficController@ajaxlisting')->name('web_traffic.listing');

Route::resource('web_traffic','Web_trafficController');

//delete image

Route::post('delete_logo','SettingController@delete_logo')->name('delete_logo');
Route::post('delete_faviconlogo','SettingController@delete_faviconlogo')->name('delete_faviconlogo');
Route::post('delete_emaillogo','SettingController@delete_emaillogo')->name('delete_emaillogo');
Route::post('delete_defaultbanner','SettingController@delete_defaultbanner')->name('delete_defaultbanner');
Route::post('delete_authirimage','SettingController@delete_authorimage')->name('delete_authorimage');
