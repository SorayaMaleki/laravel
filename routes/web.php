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
Route::get('/', function () {
    return view('welcome');
});

/** route Only authenticated users with middlware */
Route::get('profile', ['middleware' => 'auth.basic', function () {
    /** or write in controller*/
}]);

/** custom  form */
Route::get('form', 'FormController@index')->name('form');
Route::post('register', 'FormController@register')->name('register');

/** cooke and session */
Route::get('/cookie/set', 'CookieController@setCookie')->name('setCookie');
Route::get('/cookie/get', 'CookieController@getCookie')->name('getCookie');
Route::get('session/get', 'SessionController@access');
Route::get('session/set', 'SessionController@store');
Route::get('session/remove', 'SessionController@delete');

/** ajax request */
Route::get('ajax', function () {
    return view('ajax');
});
Route::post('/getmsg', 'AjaxController@index');

/** layout */
Route::get('layout', function () {
    return view('layout');
});

/** locale */
Route::get('locale/{locale}', 'LocaleController@index')->name('locale');

/** Mutator is a way to change data when it is set,
 * so if you want all your emails in your database to be lowercase only, you could do:*/
Route::get('/MutatorEmail', function () {
    $user = App\User::find(1);
    $user->email = 'EMAIL@GMAIL.com';
    $user->save();
});

/** Authorization */
// Go to the app  >>  providers  >>  AuthServiceProvider.php file and define the gate.
//Route::get('/Authorized','AuthorizationController@private')->name('Authorized');
//Route::get('/adminonly','AuthorizationController@adminonly')->name('adminOnly');

/** prefix  */
//Route::group([
//    'middleware' => ['web'],  //middleware
//    'prefix' => 'm-a-d-m-i-n', // make m-a-d-m-i-n/post
//    'namespace' => 'Admin' //folder in controller
//    'as' => 'Admiiiin.' //name of route
//], function () {
//    Route::get('/','ManageController@index')->name('index');
//    Route::group(['prefix' => 'function', 'as' => 'function.'],function () {
    /** name=Admiiiin.function.list and url= m-a-d-m-i-n/function/list*/
//        Route::get('/list', 'ManageController@List')->name('list');
//        Route::get('/add','ManageController@addFunction')->name('add');
//        Route::post('/update/{id}','ManageController@updateFunction')->name('update');
//    });
//});

    /** route for relation example */
    Route::get('/rel/{id?}', 'RelationController@rel');
    Route::get('/menytomenyrel/{id?}', 'RelationController@menytomenyrel');
    Route::get('/userprofile/{id?}', 'RelationController@userprofile');
    Route::get('/userposts/{id?}', 'RelationController@userposts');
    Route::get('/poststags/{id?}', 'RelationController@poststags');
    Route::get('/postsrate/{id?}', 'RelationController@postsrate');

    /** mutator */
    Route::get('/mutator/{id?}', 'MutatorController@index');

    /** collection */
//Route::get('/collection/{id?}', 'CollectionController@index');

   /** lazy collection */
Route::get('/lazy-collection', 'LazyCollectionController@index');

   /** cursor */
Route::get('/cursor', 'LazyCollectionController@cursor');

   /** eager */
Route::get('/eager', 'LazyCollectionController@eager');


    /** pagination */
    Route::get('/pagination/{id?}', 'PaginationController@index');

    /** cache */
    Route::get('/cache', "CacheController@index")->name("cache");

    /** interface */
    Route::get('/interface', "InterfaceController@index")->name("interface");

    /** facade */
    Route::get('/facade', "FacadeController@index")->name('facade');

    /** error handler-exception */
    Route::get('/exception', "ExceptionController@index")->name('exception');


//php artisan make auth --->changed in laravel6 to php artisan ui bootstrap --auth
//to show auth class(luminate\Support\Facades\Auth::class)
// install barryvdh/laravel-ide-helper
//in vendor\laravel\framework\src\Illuminate\Routing\Rsouter.php
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');


    /** authorization */
    /** gate */
    Route::get('/authorization', 'AuthorizationController@index')->name('authorization');
    Route::get('/gate', 'AuthorizationController@gate')->name('gate');

    /** policy */
//php artisan make:policy PostPolicy --model Post
//register to AuthServiceProvider
    Route::get('/policy', 'AuthorizationController@policy')->name('policy');

    /** send email */
    Route::get('/mail', 'MailController@index')->name('mail');
    Route::get('/showmail', 'MailController@showmail')->name('showmail');
    Route::get('/sendmailtouser', 'MailController@sendmailtouser')->name('sendmailtouser');
    Route::get('/markdown', 'MailController@markdown')->name('markdown');

    /** subquery  */
Route::get('/subquery','SubQueryController@index')->name('subquery');


//php artisan ui bootstrap --auth
Route::get('/passwordgdg', function () {
    dd("we are here");
})->middleware('password.confirm');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
