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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('website', 'Api\HomeController@getWebsiteLink');
Route::get('services', 'Api\HomeController@getServicesLink');
Route::get('clients_area', 'Api\HomeController@getClientsAreaLink');
Route::get('contacts', 'Api\HomeController@getContacts');
Route::post('login_user', 'Api\HomeController@loginUser');
Route::get('additional_links', 'Api\HomeController@getAdditionalLinks');