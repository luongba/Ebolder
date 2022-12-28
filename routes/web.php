<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
//frontEnd
Route::prefix('/')->group(function () {
    Route::get('/chinh-sach-rieng-tu', function () {
        return '<h1>Chinh Sach Rieng Tu</h1>';
    });
    Route::get('/logout', 'UserController@logout')->name('logout');


    Route::get('/sign-in', 'HomeController@signIn')->name('sign-in');
    Route::get('/sign-up', 'HomeController@signUp')->name('sign-up');
    Route::get('/sign-up-email', 'HomeController@signUpEmail')->name('sign-up-email');
    Route::get('/recover-password', 'HomeController@recoverPassword')->name('recover-password');

    Route::post('/auth/register', 'AuthController@register')->name('auth.register');
    Route::post('/auth/login', 'AuthController@login')->name('auth.login');
    Route::post('reset-password', 'ResetPasswordController@sendMail')->name('reset-password');
    Route::post('reset-password/{token}', 'ResetPasswordController@reset')->name('reset-password-token');
    Route::get('reset-password', function (Request $request) {
        if (isset($request->token)){
            $token = $request->token;
            return view('pages.reset-enter-password', compact('token'));
        }
        return view('pages.sign-in');

    })->name('reset-enter-password');
    Route::get('reset-password/pending', function () {

        return view('pages.message');
    })->name('reset-password-pending');
    Route::get('/auth/facebook', 'SocialAuthController@redirectToProvider')->name('auth.facebook');
    Route::get('/auth/facebook/callback', 'SocialAuthController@handleProviderCallback');

    //trang-chu
    Route::get('/', 'HomeController@index')->name('home-page');
    Route::get('/learn', 'HomeController@learnPage')->name('learn-page');
    Route::prefix('/english-level-test')->group(function () {
        Route::get('/', 'HomeController@testPage')->name('test-page')->middleware('checkLogin');
        Route::get('/Vocabulary', 'HomeController@vocabularyTest')->name('vocabulary-test-page')->middleware('checkLogin');
        Route::get('/Grammar', 'HomeController@grammarTest')->name('grammar-test-page')->middleware('checkLogin');
        Route::get('/Reading', 'HomeController@readingTest')->name('reading-test-page')->middleware('checkLogin');
        Route::get('/Listening', 'HomeController@listeningTest')->name('listening-test-page')->middleware('checkLogin');
    });



});

//admin

Route::middleware(['checkLogin'])->group(function () {
    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', 'HomeController@home')->name('home');
        //vocabulary
        Route::get('/volabulary-level-test', 'Admin\VocabularyController@index')->middleware('can:Vocabulary_List')->name('vocabulary-list');
        Route::get('/volabulary-level-test/detail/{id}', 'Admin\VocabularyController@detailTopic')->name('vocabulary-detail')->middleware('can:Vocabulary_Detail');
        Route::get('/volabulary-level-test/question-list', 'Admin\VocabularyController@questionlist')->name('vocabulary-question-list')->middleware('can:Question_Vocabulary_List');
        Route::get('/volabulary-level-test/question-create', 'Admin\VocabularyController@create')->name('vocabulary-question-create')->middleware('can:Question_Vocabulary_Create');

        //listening
        Route::get('/listening-level-test/question-list', 'Admin\ListenController@listQuestion')->name('listening-question-list')->middleware('can:Question_Listening_List');
        Route::get('/listening-level-test/question-create', 'Admin\ListenController@createQuestion')->name('listening-question-create')->middleware('can:Question_Listening_Create');
        Route::get('/listening-level-test/question-edit/{id}', 'Admin\ListenController@editQuestion')->name('listening-question-edit')->middleware('can:Question_Listening_Edit');
        Route::get('/topic-listening-level-test', 'Admin\ListenController@topicList')->name('topic-listening-list')->middleware('can:Listening_List');
        Route::get('/detail-topic-listening/{id}', 'Admin\ListenController@detailTopic')->name('detail-topic-listening')->middleware('can:Listening_Detail');
        //reading
        Route::get('/reading-level-test/topic-list', 'Admin\ReadController@listTopic')->name('reading-topic-list')->middleware('can:Reading_List');
        Route::get('/reading-level-test/topic-create', 'Admin\ReadController@createTopic')->name('reading-topic-create')->middleware('can:Reading_Create');
        Route::get('/reading-level-test/topic-detai/{id}', 'Admin\ReadController@detailTopic')->name('reading-topic-detail')->middleware('can:Reading_Detail');
        //grammar
        Route::get('/grammar-level-test', 'Admin\GrammarController@index')->name('grammar-list')->middleware('can:Grammar_List');
        Route::get('/grammar-level-test/detail/{id}', 'Admin\GrammarController@detailTopic')->name('grammar-detail')->middleware('can:Grammar_Detail');
        Route::get('/grammar-level-test/question-list', 'Admin\GrammarController@questionlist')->name('grammar-question-list')->middleware('can:Question_Grammar_List');
        Route::get('/grammar-level-test/question-create', 'Admin\GrammarController@create')->name('grammar-question-create')->middleware('can:Question_Grammar_Create');

        //user
        Route::get('/users', 'Admin\UserController@index')->name('user-list')->middleware('can:User_List');
        Route::get('/user/create', 'Admin\UserController@create')->name('user-create')->middleware('can:User_Create');
        Route::get('/user/edit/{id}', 'Admin\UserController@edit')->name('user-edit')->middleware('can:User_Edit');
        Route::get('/user/exam-history/{id}', 'Admin\UserController@history')->name('user-history');
        //role
        Route::get('/roles', 'Admin\RoleController@index')->name('role-list')->middleware('can:Role_List');
        Route::get('/role/create', 'Admin\RoleController@create')->name('role-create')->middleware('can:Role_Create');
        Route::get('/role/edit/{id}', 'Admin\RoleController@edit')->name('role-edit')->middleware('can:Role_Edit');

        //learn
        Route::get('/lesson', 'Admin\LearnController@index')->name('lesson-list');
        Route::get('/lesson/topic-create', 'Admin\LearnController@createTopic')->name('lesson-topic-create');
        Route::get('/lesson/topic-detail/{id}', 'Admin\LearnController@detailTopic')->name('lesson-topic-detail');
    });
});
