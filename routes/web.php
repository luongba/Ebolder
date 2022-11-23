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
    Route::get('/', 'HomeController@home')->name('home');
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

    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/volabulary-level-test', 'Admin\VocabularyController@index')->name('vocabulary-list');
        Route::get('/volabulary-level-test/detail/{id}', 'Admin\VocabularyController@detailTopic')->name('vocabulary-detail');
        Route::get('/volabulary-level-test/question-list', 'Admin\VocabularyController@questionlist')->name('vocabulary-question-list');
        Route::get('/volabulary-level-test/question-create', 'Admin\VocabularyController@create')->name('vocabulary-question-create');
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


Route::middleware(['checkSign'])->group(function () {
    Route::get('/sign-in', 'HomeController@signIn')->name('sign-in');
    Route::get('/sign-up', 'HomeController@signUp')->name('sign-up');
    Route::get('/sign-up-email', 'HomeController@signUpEmail')->name('sign-up-email');
    Route::post('/register', 'UserController@register')->name('register');
    Route::post('/login', 'UserController@login')->name('login');
    Route::get('/recover-password', 'HomeController@recoverPassword')->name('recover-password');
});




