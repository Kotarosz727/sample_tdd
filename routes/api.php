<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('customers', 'ApiController@getCustomers');
Route::post('customers', 'ApiController@postCustomers');

Route::get('customers/{customer_id}', 'ApiController@getCustomer');
Route::put('customers/{customer_id}', 'ApiController@putCustomer');


Route::delete('customers/{customer_id}', 'ApiController@deleteCustomer');
Route::get('reports', 'ApiController@getReports');
Route::post('reports', 'ApiController@postReport');
Route::get('reports/1', 'ApiController@getReport');
Route::put('reports/1', 'ApiController@putReport');
Route::delete('reports/1', 'ApiController@deleteReport');
