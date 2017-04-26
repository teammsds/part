<?php

/**
 *|--------------------------------------------------------------------------
 *| Application Routes
 *|--------------------------------------------------------------------------
 *|
 *| Here is where you can register all of the routes for an application.
 *| It's a breeze. Simply tell Laravel the URIs it should respond to
 *| and give it the controller to call when that URI is requested.
 *|
 *
 * 
 */

Route::get('/', function () {
    return view('welcome');
});
Route::resource('matches','MatchController');
Route::resource('tournaments','TournamentController');
Route::resource('schools','SchoolController');
Route::resource('teams','TeamController');
Route::resource('players','PlayerController');
Route::resource('fouls','FoulController');
Route::resource('referees','RefereeController');
Route::resource('refereematches','RefereematchController');
Route::resource('mymatches','PlayermatchController');
Route::resource('table','LeaderboardController');
Route::resource('stats','StatisticController');
Route::resource('teamlist','PListController');
Route::resource('selectplayers','PlayerselectController');
Route::get('matches/detail/{id}','MatchController@detail');
Route::get('players/detail/{id}','PlayerController@detail');
Route::get('playerlist/{id}','PListController@detail');
Route::get('select/{id}','PlayerselectController@select');
Route::get('selectplayer/{id}','PlayerselectController@selectplayer');
Route::get('splayer/{id1}/{id2}/{id3}/{id4}','PlayerselectController@add');

    //



Route::resource('rprofile','RprofileController');
Route::resource('pprofile','PprofileController');
Route::resource('referees','RefereeController');


Route::resource('fields','FieldController');


Route::get('php-version', function()
{
    return phpinfo();
});

Route::get('laravel-version', function()
{
    $laravel = app();
    return 'Your Laravel Version is '.$laravel::VERSION;
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('change-password', 'Auth\AuthController@updatePassword');
    Route::get( 'change-password', 'Auth\AuthController@updatePassword');

    Route::get('/home', 'HomeController@index');
    Route::get('/matches/detail', 'MatchController@detail');
    Route::get('/foullist', 'FoulController@foullist');
    Route::get('/teammatches', 'TeamController@coachteam');
    Route::get('/about', 'HomeController@display');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');

// Exporting to Excel
    Route::get('/exportschools', 'Excelcontroller@exportschools');
    Route::get('/exportteams', 'Excelcontroller@exportteams');
    Route::get('/exportplayers', 'Excelcontroller@exportplayers');  
    Route::get('/exportreferees', 'Excelcontroller@exportreferees');    
    Route::get('/exportmatches', 'Excelcontroller@exportmatches');
    Route::get('/exporttournaments', 'Excelcontroller@exporttournaments');  
    Route::get('/exportfields', 'Excelcontroller@exportfields');    

//password reset
    Route::get('password/reset.{token?}', 'Auth\PasswordController@showresetForm');
    Route::post('password/email' , 'Auth\PasswordController@sendResetLinkEmail');
    Route::Post('password/reset', 'Auth\PasswordController@reset');



