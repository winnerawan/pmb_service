<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', 'NewsController@root');
Route::get('news', 'NewsController@index');
Route::get('infos', 'InfoController@index');
Route::get('infos/cost', 'InfoController@cost');
Route::get('infos/track', 'InfoController@track');
Route::get('infos/schedule', 'InfoController@schedule');
Route::get('search', 'SearchController@search');
