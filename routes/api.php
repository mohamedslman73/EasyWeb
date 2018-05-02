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
});
*/

Route::group(['prefix'=>'{lang}','middleware'=>'apiLocale'],function (){

    Route::get('regions',"Api\RegionsController@getRegions");
    Route::group(['prefix'=>'user'],function (){
        Route::post('register',"Api\UsersController@register");
        Route::post('login',"Api\UsersController@login");
        Route::post('fblogin',"Api\UsersController@fblogin");


        Route::post('forgetpassword',"Api\UsersController@forgetPassword");

        Route::group(['middleware'=>'apiAuth'],function (){
            Route::get('get',"Api\UsersController@getUser");
            Route::post('edit',"Api\UsersController@editUser");

            Route::post('favorite',"Api\UsersController@addUserFavorite");
            Route::get('getfavorites',"Api\UsersController@getUserFavorites");
            Route::post('deletefavorite',"Api\UsersController@deleteUserFavorite");

            Route::post('changepassword',"Api\UsersController@changePassword");
            Route::get('logout',"Api\UsersController@logout");
        });

    });
    Route::group(['prefix'=>'schools'],function (){
        Route::post('add',"Api\SchoolsController@addSchool");
        Route::post('addlogo',"Api\SchoolsController@addLogo");
        Route::get('get',"Api\SchoolsController@getSchool");
        Route::get('facilities',"Api\SchoolsController@getFacilities");
        Route::get('schools',"Api\SchoolsController@getAllSchool");
        Route::patch('editschool',"Api\SchoolsController@editSchool");
        Route::get('search',"Api\SchoolsController@Search");
        Route::post('allsearch',"Api\SchoolsController@allSearch");
    });
});




