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

Route::post('/auth/loginApi', 'AuthController@loginApi')->name('auth.login-api');
Route::middleware('auth:api')->group(function (){
    Route::get('/auth/user', 'AuthController@getUser')->name('auth.user');
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
        Route::get('/topic-list-listening', 'Admin\ListenController@ListTopic')->name('topic-list-listening');
        Route::post('/create-topic-listening', 'Admin\ListenController@createTopic')->name('create-topic-listening');
        Route::get('/detail-topic-listening/{id}', 'Admin\ListenController@detailTopicData')->name('detail-topic-listening');
        Route::post('/add-audio-to-topic-listening', 'Admin\ListenController@addAudioToTopic')->name('add-audio-to-topic-listening');
        Route::post('/remove-audio-from-topic-listening', 'Admin\ListenController@removeAudioFromTopic')->name('remove-audio-from-topic-listening');
        Route::post('/edit-topic-listening', 'Admin\ListenController@editTopic')->name('edit-topic-listening');
        Route::post('/delete-topic-listening', 'Admin\ListenController@deleteTopic')->name('delete-topic-listening');

        //Reading
        Route::post('/add-question-reading', 'Admin\ReadController@storeTopic')->name('add-topic-question-reading');
        Route::get('/list-topic-reading', 'Admin\ReadController@listTopicApi')->name('add-topic-question-reading');
        Route::post('/delete-topic-reading', 'Admin\ReadController@deleteTopicApi')->name('delete-topic-question-reading');
        Route::get('/detail-topic-reading/{id}', 'Admin\ReadController@detailTopicData')->name('detail-topic-question-reading');
        Route::post('/delete-question-reading', 'Admin\ReadController@deleteQuestionData')->name('delete-question-reading');
        Route::post('/delete-answer-reading', 'Admin\ReadController@deleteAnswerData')->name('delete-answer-reading');
        Route::post('/add-or-update-question-reading', 'Admin\ReadController@addQuestionSingle')->name('add-or-update-question-reading');
        Route::post('/update-question-reading', 'Admin\ReadController@addQuestionMultiple')->name('update-question-reading');
        //Grammar
        Route::post('/add-question-to-topic-grammar', 'Admin\GrammarController@addQuestionToTopic')->name('add-question-to-topic-grammar');
        Route::post('/edit-topic-grammar', 'Admin\GrammarController@editTopic')->name('edit-topic-grammar');
        Route::post('/remove-question-from-topic-grammar', 'Admin\GrammarController@removeQuestionFromTopic')->name('remove-question-from-topic-grammar');
        Route::get('/detail-topic-grammar/{id}', 'Admin\GrammarController@detailTopicData')->name('detail-topic-grammar');
        Route::get('/list-topic-grammar', 'Admin\GrammarController@ListTopic')->name('list-topic-grammar');
        Route::post('/store-topic-grammar', 'Admin\GrammarController@createTopic')->name('store-topic-grammar');
        Route::post('/delete-topic-grammar', 'Admin\GrammarController@deleteTopic')->name('delete-topic-grammar');
        Route::post('/store-question-grammar', 'Admin\GrammarController@store')->name('store-grammar');
        Route::get('/list-question-grammar', 'Admin\GrammarController@getAllInfoQuestion')->name('list-grammar');
        Route::put('/update-question-grammar', 'Admin\GrammarController@update')->name('update-grammar');
        Route::post('/delete-answer-grammar', 'Admin\GrammarController@destroyAns')->name('delete-grammar');
        Route::post('/delete-question-grammar', 'Admin\GrammarController@destroyQues')->name('delete-question-grammar');
        //user
        Route::get('/list-user', 'Admin\UserController@getAllUser')->name('get-all-user');
        Route::post('/create-user', 'Admin\UserController@registerUserApi')->name('create-user');
        Route::get('/detail-user/{id}', 'Admin\UserController@getDetailUser')->name('detail-user');
        Route::post('/update-user/{id}', 'Admin\UserController@updateUserApi')->name('update-user');
        Route::post('/delete-user/{id}', 'Admin\UserController@deleteUserApi')->name('delete-user');

        //Home
        Route::post('/save-history', 'HomeController@saveHistory')->name('save-hítory');

        //roles
        Route::get('/get-all-role', 'Admin\RoleController@getAllRole')->name('get-all-role');
        Route::get('/all-permision', 'Admin\RoleController@getAllPermision')->name('all-permision');
        Route::post('/create-role-permision', 'Admin\RoleController@createRolePermision')->name('create-role-permision');
        Route::get('/get-detail-role/{id}', 'Admin\RoleController@getDetailRole')->name('get-detail-role');
        Route::post('/update-role-permision/{id}', 'Admin\RoleController@updateRolePermision')->name('update-role-permision');
        Route::post('/delete-role-permision/{id}', 'Admin\RoleController@deleteRolePermision')->name('delete-role-permision');

        //learn admin
        Route::get('/list-topic-lesson', 'Admin\LearnController@ListTopic')->name('list-topic-lesson');
        Route::post('/delete-topic-lesson', 'Admin\LearnController@deleteTopic')->name('delete-topic-lesson');
        Route::post('/create-topic-lesson', 'Admin\LearnController@createTopicApi')->name('create-topic-lesson');
        Route::get('/detail-topic-lesson/{id}', 'Admin\LearnController@detailTopicApi')->name('detail-topic-lesson');
        Route::post('/add-or-update-question-lesson', 'Admin\LearnController@addQuestionSingle')->name('add-or-update-question-lesson');
        Route::post('/delete-question-lesson', 'Admin\LearnController@deleteQuestionData')->name('delete-question-lesson');
        Route::post('/update-question-lesson', 'Admin\LearnController@addQuestionMultiple')->name('update-question-lesson');



    });
});




