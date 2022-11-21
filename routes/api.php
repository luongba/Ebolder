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


Route::prefix('/admin')->name('admin.')->group(function () {
    Route::post('/store-question-vocabulary', 'Admin\VocabularyController@store')->name('store-vobulary');
    Route::get('/list-question-vocabulary', 'Admin\VocabularyController@getAllInfoQuestion')->name('list-vocabulary');
    Route::put('/update-question-vocabulary', 'Admin\VocabularyController@update')->name('update-vocabulary');
    Route::post('/delete-answer-vocabulary', 'Admin\VocabularyController@destroyAns')->name('delete-vocabulary');
    Route::post('/delete-question-vocabulary', 'Admin\VocabularyController@destroyQues')->name('delete-question-vocabulary');
});
