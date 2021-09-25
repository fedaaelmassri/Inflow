<?php

use Illuminate\Support\Facades\Route;

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



Route::post('/lang' , 'LangController\LangController@index')->middleware('lang')->name('langGange');
Route::get('/change/en' , 'LangController\LangController@changeToEn')->middleware('lang')->name('langGange');
Route::get('/change/ar' , 'LangController\LangController@changeToAr')->middleware('lang')->name('langGange');
Auth::routes();
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cadWithAuth', function () {
    $query = http_build_query([
        'client_id' => '197179214595-1hicdi5vrnrq6m9pv0g297k36bjnctqe.apps.googleusercontent.com', 
        'access_type'=>'offline',
        'include_granted_scopes' => 'true',
        'state'=>'state_parameter_passthrough_value',
        'redirect_uri' => 'https://localhost/Inflow/public/login/google/callback',
        'response_type' => 'code',
        'scope' => 'https://www.googleapis.com/auth/youtube.readonly'
    ]);
    return redirect('https://accounts.google.com/o/oauth2/auth?'.$query);
})->name('cadWithAuth');
Route::get('/getLoginUrl', 'HomeController@getLoginUrl');
Route::get('/login/google/callback', 'HomeController@youtubeCallback');
Route::namespace('Company')->prefix('/company')->group(function (){
    Route::get('/signup', 'CompanyController@index')->name('company-signup');
    Route::post('/addCompany', 'CompanyController@store')->name('company.store');
    Route::get('profile/{id}', 'CompanyController@show_profile')->name('profile');
    Route::get('influencers', 'CompanyController@all_influencers')->name('all_influencers');  

});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::get('login/instagram',
 'Auth\LoginController@redirectToInstagramProvider')->name('instagram.login');

Route::get('callback', 'Auth\LoginController@instagramProviderCallback')->name('instagram.login.callback');
Route::get('login/snapchat',
 'Auth\LoginController@redirectToSnapchatProvider')->name('snapchat.login');

Route::get('snapchat/callback', 'Auth\LoginController@snapchatProviderCallback')->name('snapchat.login.callback');


Route::get('/dash', function () {
    return view('layouts.dashboard');
})->name('dash');
