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

    Route::prefix('/campaigns')->group(function () {
        Route::get('/', 'HomeController@campaignHome')->name('campaign-home');
        Route::get('/create', 'HomeController@campaignCreate')->name('campaign-create');
        Route::get('/template', 'HomeController@campaignTemplate')->name('campaign-template');
        Route::get('/editor', 'HomeController@campaignEditor')->name('campaign-editor');
        Route::get('/detail', 'HomeController@campaignDetail')->name('campaign-detail');
    });
    Route::prefix('/newsletters')->group(function () {
        Route::get('/', 'HomeController@newsletterHome')->name('newsletter-home');
        Route::get('/create', 'HomeController@newsletterCreate')->name('newsletter-create');
        Route::get('/favorite-create', 'HomeController@newsletterFavorite')->name('newsletter-favorite');
        Route::get('/editor', 'HomeController@newsletterEditor')->name('newsletter-editor');
        Route::get('/config', 'HomeController@newsletterConfig')->name('newsletter-config');
        Route::get('/edit', 'HomeController@newsletterEdit')->name('newsletter-edit');

    });
    Route::prefix('/customer-winback')->group(function () {
        Route::get('/', 'HomeController@winbackHome')->name('winback-home');
        Route::get('/create', 'HomeController@winbackCreate')->name('winback-create');
        Route::get('/favorite-create', 'HomeController@winbackFavorite')->name('winback-favorite');
        Route::get('/editor', 'HomeController@winbackEditor')->name('winback-editor');
        Route::get('/config', 'HomeController@winbackConfig')->name('winback-config');
        Route::get('/edit', 'HomeController@winbackEdit')->name('winback-edit');
    });
    Route::prefix('/email-template')->group(function () {
        Route::get('/', 'HomeController@eTemplateHome')->name('eTemplate-home');
        Route::get('/favorite', 'HomeController@eTemplateFavorite')->name('eTemplate-favorite');
        Route::get('/editor', 'HomeController@eTemplateEditor')->name('eTemplate-editor');
    });
    Route::prefix('/coupon')->group(function () {
        Route::get('/', 'HomeController@couponHome')->name('coupon-home');
        Route::get('/create', 'HomeController@couponCreate')->name('coupon-Create');
        Route::get('/edit', 'HomeController@couponEdit')->name('coupon-edit');
    });
    Route::prefix('/customer')->group(function () {
        Route::get('/', 'HomeController@customer')->name('customer');
        Route::get('/detail', 'HomeController@customerDetail')->name('customer-detail');
    });
Route::get('/chinh-sach-rieng-tu', function (){
    return '<h1>Chinh Sach Rieng Tu</h1>';
});
Route::get('/auth/facebook', 'SocialAuthController@redirectToProvider')->name('auth.facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@handleProviderCallback');
Route::middleware(['checkLogin'])->group(function () {
    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', 'HomeController@home')->name('home');
        //vocabulary
        Route::get('/volabulary-level-test', 'Admin\VocabularyController@index')->name('vocabulary-list');
        Route::get('/volabulary-level-test/detail/{id}', 'Admin\VocabularyController@detailTopic')->name('vocabulary-detail');
        Route::get('/volabulary-level-test/question-list', 'Admin\VocabularyController@questionlist')->name('vocabulary-question-list');
        Route::get('/volabulary-level-test/question-create', 'Admin\VocabularyController@create')->name('vocabulary-question-create');

        //listening
        Route::get('/listening-level-test/question-list', 'Admin\ListenController@listQuestion')->name('listening-question-list');
        Route::get('/listening-level-test/question-create', 'Admin\ListenController@createQuestion')->name('listening-question-create');
        Route::get('/listening-level-test/question-edit/{id}', 'Admin\ListenController@editQuestion')->name('listening-question-edit');
        Route::get('/topic-listening-level-test', 'Admin\ListenController@topicList')->name('topic-listening-list');
        Route::get('/detail-topic-listening/{id}', 'Admin\ListenController@detailTopic')->name('detail-topic-listening');
        //reading
        Route::get('/reading-level-test/topic-list', 'Admin\ReadController@listTopic')->name('reading-topic-list');
        Route::get('/reading-level-test/topic-create', 'Admin\ReadController@createTopic')->name('reading-topic-create');
        Route::get('/reading-level-test/topic-detai/{id}', 'Admin\ReadController@detailTopic')->name('reading-topic-detail');
        //grammar
        Route::get('/grammar-level-test', 'Admin\GrammarController@index')->name('grammar-list');
        Route::get('/grammar-level-test/detail/{id}', 'Admin\GrammarController@detailTopic')->name('grammar-detail');
        Route::get('/grammar-level-test/question-list', 'Admin\GrammarController@questionlist')->name('grammar-question-list');
        Route::get('/grammar-level-test/question-create', 'Admin\GrammarController@create')->name('grammar-question-create');
    });
});



    Route::get('/report', 'HomeController@report')->name('report');
    Route::prefix('/settings')->group(function () {
        Route::get('/my-info', 'HomeController@myInfo')->name('my-info');
        Route::get('/my-plan', 'HomeController@myPlan')->name('my-plan');
        Route::prefix('/plans')->group(function () {
            Route::get('/', 'HomeController@plan')->name('plan');
            Route::get('/package-payment', 'HomeController@packagePayment')->name('package-payment');
        });
        Route::get('/email', 'HomeController@sendingEmail')->name('sending-email');
        Route::prefix('/sending-domain')->group(function () {
            Route::get('/', 'HomeController@sendingDomain')->name('sending-domain');
            Route::get('/id-domain', 'HomeController@idDomain')->name('id-domain');
        });
        Route::get('/business-information', 'HomeController@businessInformation')->name('business-information');

    });
    Route::get('/logout', 'UserController@logout')->name('logout');


    Route::get('/sign-in', 'HomeController@signIn')->name('sign-in');
    Route::get('/sign-up', 'HomeController@signUp')->name('sign-up');
    Route::get('/sign-up-email', 'HomeController@signUpEmail')->name('sign-up-email');
    Route::get('/recover-password', 'HomeController@recoverPassword')->name('recover-password');

Route::post('/auth/register', 'AuthController@register')->name('auth.register');
Route::post('/auth/login', 'AuthController@login')->name('auth.login');


