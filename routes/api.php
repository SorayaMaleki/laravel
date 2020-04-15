<?php
//application programming interface
//send and receive data in json
//http code status
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** API */
//add prefix api(api/...) // in app/provider/RouteServiceProvider

Route::post("/loginApi","ApiController@loginApi")->name('loginApi');
Route::post("/logoutApi","ApiController@logoutApi")->middleware('auth:api')->name('logoutApi');
Route::get("/currentUser","ApiController@currentUser")->middleware('auth:api')->name('currentUser');

//add prefix post(api/post/...)
Route::group(["middleware"=>['auth:api'],"prefix"=>"post","as"=>"posts."],function (){
    Route::get("/postsList/", "ApiController@postsList")->name("postsList");
    Route::get("/postsPagedList/", "ApiController@postsPagedList")->name("postsPagedList");
    Route::get("/getPost/{id?}", "ApiController@getPost")->name("getPost");
    Route::Post("/createPost/", "ApiController@createPost")->name("createPost");
    Route::delete("/deletePost/{id}", "ApiController@deletePost")->name("deletePost");
    Route::put("/updatePost/{id}", "ApiController@updatePost")->name("updatePost");
});

//add prefix user(api/user/...)
Route::group(["middleware"=>['auth:api'],"prefix"=>"user","as"=>"posts."],function (){
    Route::get("usersList", "ApiController@usersList")->name("usersList");
    Route::get("/getUser/{id?}", "ApiController@getUser")->name("getUser");
    Route::Post("/createUser/", "ApiController@createUser")->name("createUser");
    Route::delete("/deleteUser/{id}", "ApiController@deleteUser")->name("deleteUser");
    Route::put("/updateUser/{id}", "ApiController@updateUser")->name("updateUser");

});

