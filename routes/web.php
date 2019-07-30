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
/*****************************************************************/
Route::get('/', function () {
    return view('welcome');
}); 
// l'accueil generale 
Route::get('/notification', function () {
    return view('notif'); 
    // la notification apres creation du compte
});

Route::post('/envoyerMsg', 'MessageController@messagIn');
Route::get('/membre/{id}','DiscussionController@membreInfo');

Route::get('/evenements','EventController@index');
Route::post('/creerEvent', 'EventController@creerEvent');

Route::get('/discusions','DiscussionController@index');
Route::get('/documents','DocumentsController@index');

Route::get('/projets','ProjetsController@index');
Route::get('/equipes','EquipesController@index');

Route::get('/profile','ProfileController@index');
Route::post('/editerImage','ProfileController@photoUp');
Route::post('/editer','ProfileController@editer');

//Route::post('/login', 'Auth\LoginController@postLogin');
//Route::get('/register', 'Auth\RegisterController@getInfo');// les infos pour sign up
/******************************deja creer :******************************************/

//Auth::routes();
// Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@getInfo')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
  
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');

//admin route for our multi-auth system

Route::prefix('admin')->group(function () {
    Route::get('/home', 'AdminController@index')->name('admin.dashboard');
    Route::get('/gestionComptes','GestionComptesController@index');
    Route::post('/approuver','GestionComptesController@approuver');
    Route::get('/gestionEvent','GestionEventController@index');
    Route::post('/creerEvent', 'GestionEventController@creerEvent');
    
    Route::post('/activerEvent', 'GestionEventController@activer');    
    Route::get('/gestionGroup','GestionGroupController@index');
    
    Route::post('/creerGroupe','GestionGroupController@creerGroupe');
    
    Route::get('/membres/{id}','GestionGroupController@getMembres');
    Route::get('/membre/{id}', 'GestionGroupController@membreInfo');

    /************les infos d'entreprise :************/
    Route::get('/gestionInfos','GestionInfosController@index');
    Route::post('/equipe','GestionInfosController@gestionEquipe');
    Route::post('/projets','GestionInfosController@gestionProjet');
    Route::post('/depart','GestionInfosController@gestionDepart');
    Route::post('/ste','GestionInfosController@gestionInfos');


    Route::get('/profile','ProfileAdminController@index');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    //admin password reset routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});






