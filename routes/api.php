<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\additems;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('add', [additems::class, 'additem']);
Route::get('getitems',[additems::class, 'getallitemes']);
Route::get('getproducts',[additems::class, 'getallproducts']);
Route::post('delete',[additems::class, 'deleteitem'])  ;

