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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('anmeldung/banderhalten/{anmeldung}', 'VerwaltungController@BandErhalten')->name("anmeldung.banderhalten");
    Route::get('anmeldung/loeschen/{anmeldung}', 'VerwaltungController@Loeschen')->name("anmeldung.loeschen");
    Route::get('anmeldung/aktivieren/{anmeldung}', 'VerwaltungController@Aktivieren')->name("anmeldung.aktivieren");
    Route::put('anmeldung/bearbeiten', 'VerwaltungController@Edit')->name("anmeldung.bearbeitenSend");
    Route::get('anmeldung/bearbeiten/{anmeldung}', 'VerwaltungController@EditForm')->name("anmeldung.bearbeiten");
    Route::get('anmeldung/import', 'VerwaltungController@ImportForm')->name("anmeldung.importform");
    Route::post('anmeldung/ImportCSV', 'VerwaltungController@Import')->name("anmeldung.import");

    Route::get('anmeldung/', 'VerwaltungController@index')->name("anmeldungenuebersicht");
    Route::get('anmeldung/hinzufuegen', 'VerwaltungController@anmeldungCreateForm')->name("anmeldungerstellenform");
    Route::put('anmeldung/hinzufuegen', 'VerwaltungController@anmeldungCreate')->name("anmeldungerstellen");

    Route::get('anmeldung/instrumentalliste', 'VerwaltungController@Instrumental')->name("instrumentalliste");

    Route::get('anmeldung/{anmeldung}', 'VerwaltungController@show')->name("anmeldung.show");
    Route::get('anmeldung/anmelden/{anmeldung}', 'VerwaltungController@AnmeldeBtn');
    Route::get('anmeldung/helfer/{anmeldung}', 'VerwaltungController@HelferBtn');
    Route::get('anmeldung/bezahlen/{anmeldung}', 'VerwaltungController@BezahltBtn');
    Route::get('anmeldung/bescheinigung/{anmeldung}', 'VerwaltungController@BescheinigungBtn');


    Route::get('teilnehmer/comboliste', 'VerwaltungController@Combo')->name("comboliste");
    // Teilnehmer
    Route::get('teilnehmer', 'TeilnehmerController@index')->name("teilnehmer");
    Route::get('teilnehmer/hinzufuegen', 'TeilnehmerController@Add')->name("teilnehmer.add");

    Route::put('teilnehmer/create', 'TeilnehmerController@store')->name("teilnehmer.create");
    Route::get('teilnehmer/{teilnehmer}', 'TeilnehmerController@show')->name("teilnehmer.show");
    Route::get('teilnehmer/anmelden/{teilnehmer}', 'TeilnehmerController@AnmeldeBtn');
    Route::get('teilnehmer/helfer/{teilnehmer}', 'TeilnehmerController@HelferBtn');
    Route::get('teilnehmer/bezahlen/{teilnehmer}', 'TeilnehmerController@BezahltBtn');
    Route::get('teilnehmer/bescheinigung/{teilnehmer}', 'TeilnehmerController@BescheinigungBtn');

    Route::get('veranstaltungen', 'VeranstaltungController@index')->name("veranstaltungen");


    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');
});


Route::get('/', 'HomeController@index');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});
