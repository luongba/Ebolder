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
    Route::post('/add-question-to-topic-vocabulary', 'Admin\VocabularyController@addQuestionToTopic')->name('add-question-to-topic-vobulary');
    Route::post('/edit-topic-vocabulary', 'Admin\VocabularyController@editTopic')->name('edit-topic-vobulary');
    Route::post('/remove-question-from-topic-vocabulary', 'Admin\VocabularyController@removeQuestionFromTopic')->name('remove-question-from-topic-vobulary');
    Route::get('/detail-topic-vocabulary/{id}', 'Admin\VocabularyController@detailTopicData')->name('detail-topic-vobulary');
    Route::get('/list-topic-vocabulary', 'Admin\VocabularyController@ListTopic')->name('list-topic-vobulary');
    Route::post('/store-topic-vocabulary', 'Admin\VocabularyController@createTopic')->name('store-topic-vobulary');
    Route::post('/delete-topic-vocabulary', 'Admin\VocabularyController@deleteTopic')->name('delete-topic-vobulary');
    Route::post('/store-question-vocabulary', 'Admin\VocabularyController@store')->name('store-vobulary');
    Route::get('/list-question-vocabulary', 'Admin\VocabularyController@getAllInfoQuestion')->name('list-vocabulary');
    Route::put('/update-question-vocabulary', 'Admin\VocabularyController@update')->name('update-vocabulary');
    Route::post('/delete-answer-vocabulary', 'Admin\VocabularyController@destroyAns')->name('delete-vocabulary');
    Route::post('/delete-question-vocabulary', 'Admin\VocabularyController@destroyQues')->name('delete-question-vocabulary');

    //Listening
    Route::post('/add-audio-and-question-listening', 'Admin\ListenController@createAudioAndQuestion')->name('add-audio-and-question-listening');
    Route::post('/add-question-to-audio-listening', 'Admin\ListenController@storeQuestion')->name('add-question-to-audio-listening');
    Route::get('/get-audio-listening', 'Admin\ListenController@getAllAudio')->name('get-all-audio-listening');
    Route::get('/get-detail-audio-question-listening/{id}', 'Admin\ListenController@detaiQuestion')->name('get-detail-audio-listening');
    Route::post('/delete-answer-listening', 'Admin\ListenController@destroyAns')->name('delete-listening');
    Route::put('/update-question-listening', 'Admin\ListenController@updateQuestion')->name('update-question-listening');
    Route::post('/update-audio-listening/{id}', 'Admin\ListenController@updateAudio')->name('update-audio-listening');
    Route::post('/delete-audio-listening', 'Admin\ListenController@deleteAudio')->name('delete-audio-listening');
});
