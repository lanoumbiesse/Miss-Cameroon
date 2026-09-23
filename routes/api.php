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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::name('getcandidates')->post('vote/getcandidates', 'Front\ApiController@getcandidates');
Route::name('getnbvotes')->post('vote/getnbvotes', 'Front\ApiController@getnbvotes');
Route::name('savepublication')->post('publication/save', 'Front\PublicationController@savepublication');
Route::name('getposts')->post('publication/list', 'Front\PublicationController@getposts');


Route::post('register', 'Front\ApiController@register');
Route::post('login', 'Front\ApiController@authenticate');
Route::post('getuser', 'Front\ApiController@getuser');
Route::get('cagnotte', 'Front\ApiController@cagnotte');

Route::post('savecagnotte', 'Front\ApiController@savecagnotte');
Route::post('getlistcagnotte', 'Front\ApiController@getlistcagnotte');
Route::post('savecontact', 'Front\ApiController@savecontact');
Route::post('comicash/checkpayment', 'Front\ApiController@checkpayment');
Route::name('checkpaymentpaypal2')->post('vote/setpayment', 'Front\HomeController@setpayment');
Route::name('checkpaymentpaypal22')->post('vote/setpayment2', 'Front\HomeController@setpayment2');

Route::get('partenaires', 'Front\ApiController@sponsors');


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'Front\ApiController@getAuthenticatedUser');
});