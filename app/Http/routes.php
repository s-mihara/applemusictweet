<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'TopController@index');
Route::get('/search', 'ListController@search');
Route::get('/detailModal', 'DetailController@detailModal');
Route::get('/detail/{parentTitle}', 'DetailController@index');
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/all', function () {
    return redirect('search?search=');
});
Route::get('/playlist', function () {
    return redirect('search?search=apple%20music');
});


/*
  デフォルトのやつ、一応welcomeで残しとく
*/
Route::get('welcome/', function () {
  return view('welcome');
});
