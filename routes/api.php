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
Route::get('announcements', 'NewsController@index');
Route::get('infos', 'InfoController@index');
Route::get('infos/cost', 'InfoController@cost');
Route::get('infos/track', 'InfoController@track');
Route::get('infos/schedule', 'InfoController@schedule');
Route::get('search', 'SearchController@search');
Route::get('news', 'NewsController@news');
Route::get('newsDetail', 'NewsController@newsDetail');
Route::get('menus', 'InfoController@infoMenu');
Route::post('login', 'LoginController@login');
Route::get('/cost', 'InfoController@getCost'); 
Route::get('/calendar', 'InfoController@getCalendarAcademic'); 
Route::get('/prody', 'InfoController@getProgramStudy'); 

Route::get('/trackchoice', 'ProcessController@trackChoice');


Route::post('insert_pmdk', 'ProcessController@insertPMDK');
Route::post('insert_pnuan', 'ProcessController@insertPNUAN');
Route::post('insert_biodata', 'ProcessController@insertBiodata');
Route::post('insert_choosen_program', 'ProcessController@insertChoice');
Route::get('no_reg', 'ProcessController@getNoReg');
Route::get('years', 'ProcessController@getYears');
Route::put('updatestatus', 'ProcessController@updateStatus');
