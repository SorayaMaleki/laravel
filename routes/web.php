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
})->name('home');

Route::get('/index','HomeController@index')->name('form');

/** route Only authenticated users with middlware */
Route::get('profile', ['middleware' => 'auth.basic', function() {       /** or write in controller*/
}]);

/** custom  form */
Route::get('form','FormController@index')->name('form');
Route::post('register','FormController@register')->name('register');

/** cooke and session */
Route::get('/cookie/set','CookieController@setCookie')->name('setCookie');
Route::get('/cookie/get','CookieController@getCookie')->name('getCookie');
Route::get('session/get','SessionController@access');
Route::get('session/set','SessionController@store');
Route::get('session/remove','SessionController@delete');

/** ajax request */
Route::get('ajax',function(){
    return view('ajax');
});
Route::post('/getmsg','AjaxController@index');

/** layout */
Route::get('layout', function() {
    return view('layout');
});
/** locale */
Route::get('locale/{locale}','LocaleController@index')->name('locale');


/** Mutator is a way to change data when it is set,
so if you want all your emails in your database to be lowercase only, you could do:*/
Route::get('/MutatorEmail',function(){
    $user= App\User::find(1);
    $user->email = 'EMAIL@GMAIL.com';
    $user->save();
});

/** Authorization */
// Go to the app  >>  providers  >>  AuthServiceProvider.php file and define the gate.
Route::get('/Authorized','AuthorizationController@private')->name('Authorized');
Route::get('/adminonly','AuthorizationController@adminonly')->name('adminOnly');

/** prefix  */
Route::group(['prefix' => 'admin','namespace' => 'ManageApi' , 'as' => 'admin.'],function (){
    Route::get('/','ManageController@index')->name('index');//admin.index
    Route::group(['prefix' => 'function', 'as' => 'function.'],function () {
        Route::get('/function-list', 'ManageController@functionList')->name('list');//admin.function.list
        Route::get('/add','ManageController@addFunction')->name('add');
        Route::post('/store','ManageController@createFunction')->name('create');
        Route::post('/destroy/{id}','ManageController@destroyFunction')->name('destroy');
        Route::get('/edit/{id}','ManageController@editFunction')->name('edit');
        Route::post('/update/{id}','ManageController@updateFunction')->name('update');
    });
});

/** route for relation example */
Route::get('/rel/{id?}', 'RelationController@rel');
Route::get('/menytomenyrel/{id?}', 'RelationController@menytomenyrel');
Route::get('/userprofile/{id?}', 'RelationController@userprofile');
Route::get('/userposts/{id?}', 'RelationController@userposts');
Route::get('/poststags/{id?}', 'RelationController@poststags');



/** pagination */
Route::get('/pagination/{id?}', 'PaginationController@index');
