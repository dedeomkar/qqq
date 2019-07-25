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
 
Route::post('contact', 'Api\loginController@check'); 
Route::post('login', 'Api\loginController@register');  
Route::post('otp', 'Api\loginController@otp') ; 
Route::post('refresh', 'Api\loginController@refresh') ; 
