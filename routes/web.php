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


Route::get('/delete', function(){
    Item::find(8)->delete();
    // fill deleted column
});
Route::get('/restore', function(){
    Item::withTrashed()->where('id', 8)->restore();
    // empty deleted column
});
Route::get('/notdeleted', function(){
    $items=Item::get();
    foreach($items as $item){
        echo $item->title.'<br>';
    }
});
Route::get('/all', function(){
    $items =Item::withTrashed()
        ->get();
    foreach($items as $item){
        echo $item->title.'<br>';
    }
});
Route::get('/deleted', function(){
    $items =Item::onlyTrashed()
        ->get();
    foreach($items as $item){
        echo $item->title.'<br>';
    }
});

// ---------------------------------------------------------------------------------
// one to meny
Route::get('/posts', function(){
    $comment =Comment::find(1);
    echo $comment->post->title;
});
Route::get('/comments', function(){
    $posts =Post::find(61);
    foreach($posts->comment as $comment){
        echo $comment->title.'<br>';
    }
});
//many to many
Route::get('/admin-user', function(){
    $user = User::find(100);
    foreach ($user->roles as $role) {
        echo $role->name;
    }
});
// has many through


//polymorphic
// get likes Of Comment(1)
Route::get('/likesOfComment', function(){
    $post =Post::find(1);
    foreach ($post->likes as $like) {
        echo $like->id;
    }
});
// get comment/post Of like(1)
Route::get('/commentOfLike', function(){
    $like =like::find(1);
    $likeable = $like->likeable;
    echo $likeable;
});

//get tags of post(10)
Route::get('/getTags', function(){
    $post = App\Post::find(10);
    foreach ($post->tags as $tag) {
        echo $tag->name.'<br>';
    }
});

//get posts of tag(1)
Route::get('/getPosts', function(){
    $tag = App\Tag::find(1);
    foreach ($tag->posts as $post) {
        echo $post->id.'<br>';
    }
});

Route::get('/RetrievePosts', function(){
    // Retrieve all posts that have three or more comments...
    $posts = Post::has('comment', '>=', 3)->get();
    foreach($posts as $post){
        echo $post->id;
    }
});
//count of comments of posts
Route::get('/count', function(){
    $posts = App\Post::withCount('comment')->get();
    foreach ($posts as $post) {
        echo $post->id.'---->';
        echo $post->comment_count.'<br>';
    }
});

Route::get('/postOrder', function(){
    // $posts =App\Post::with('comment')->get();
    $posts =Post::with(['comment' => function ($query) {
        $query->orderBy('id', 'desc');
    }])->get();
    foreach ($posts as $post) {
        echo $post->id.' ---> ';
        foreach($post->comment as $comment){
            echo $comment->id.':'.$comment->title.'-';
        }
        echo '<br>';
    }
});
//posts that hasnt comment
Route::get('/notCommentPost', function(){
    $posts =App\Post::doesntHave('comment')->get();
    foreach ($posts as $post) {
        echo $post->id.' ---> ';
        echo '<br>';
    }
});

// save comment for post(1)
Route::get('/saveMessage', function(){
    $comment = new App\Comment();
    $comment->title="jfgjfg";
    $comment->description="ertrtrt";
    $post = App\Post::find(1);
    $post->comment()->save($comment);
});

// save comment for post(2)
// with create no need to new comment
Route::get('/saveMessage2', function(){
    $post = App\Post::find(2);
    $comment = $post->comment()->create([
        'description' =>'dfgdg',
        'title' => 'A new comment.',

    ]);
});
// meny to meny
// add role(2) to user(22)
Route::get('/addRole', function(){
    $user = App\User::find(22);
    // $user->roles()->attach($roleId);
    $user->roles()->attach(2);
});

// remove role(2) from user(20)
Route::get('/deleteRole', function(){
    $user = App\User::find(20);
    // $user->roles()->detach($roleId);
    $user->roles()->detach(2);
});

// change user(25) to roles(1,2,3) and delete role(not(1,2,3))
Route::get('/sync', function(){
    $user =User::find(25);
    $user->roles()->sync([1, 2, 3]);
});

// add user(13) roles(2,3)
Route::get('/syncWithoutDetaching ', function(){
    $user =User::find(13);
    $user->roles()->syncWithoutDetaching ([2, 3]);
});

// ----------------------------------------------------------------------
// get users with map() instead of foreach
Route::get('/getWithMap', function(){
    $users = App\User::all()
        ->map(function ($user) {
            echo $user->id.' ) ';
            echo $user->email.' ---> ';
            echo $user->name.'<br>';
        });
});
/* Mutator is a way to change data when it is set,
so if you want all your emails in your database to be lowercase only, you could do:*/
Route::get('/MutatorEmail',function(){
    $user= App\User::find(1);
    $user->email = 'EMAIL@GMAIL.com';
    $user->save();
});

//get array
Route::get('/getArray',function(){
    $users = App\User::all();

    // return $users->toArray();
    $users->toArray();
    foreach($users as $user){
        echo $user['name'];
    }
});
Route::get('/getJason',function(){
    $users = App\User::all();
    return $users->toJson();
});
// protected $visible = ['name', 'email']; in user model ,just show name and email
// make id visible
Route::get('/addIdTOGetJason',function(){
    $user = App\User::all();
    return $user->makeVisible('id')->toJson();
});
// make name visible
Route::get('/removeNameFromGetJason',function(){
    $user = App\User::all();
    return $user->makeHidden('name')->toJson();
});
// ------------------------------------------------------------------
// Authorization
// Go to the app  >>  providers  >>  AuthServiceProvider.php file and define the gate.
Route::get('/Authorized','AuthorizationController@private')->name('Authorized');
Route::get('/adminonly','AuthorizationController@adminonly')->name('adminOnly');

//admin
Route::group(['prefix' => 'admin','namespace' => 'ManageApi' , 'as' => 'admin.'],function (){
    Route::get('/','ManageController@index')->name('index');
    Route::group(['prefix' => 'function', 'as' => 'function.'],function () {
        Route::get('/function-list', 'ManageController@functionList')->name('list');
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