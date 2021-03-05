<?php

namespace App\Http\Controllers;

use App\Http\Requests\login\LoginRequest;
use App\Http\Requests\posts\CreatePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostResourceCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Post;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{

///////////// auth ////////////////////////////////////////////////////////////////////////////////

    public function loginApi(LoginRequest $request)
    {
/* to use of this login must change api from token to passport in config/auth
'api' => [
'driver' => 'passport',
'provider' => 'users',
],
change to
'api' => [
'driver' => 'token',
'provider' => 'users',
],
*/

//  delete  use HasApiTokens; in user model
        auth()->attempt([
            'email' => $request->username,
            'password' => $request->password,
        ]);
        if (auth()->check()) {
//            $token = auth()->user()->generateToken();
            $token = auth()->user()->createToken('password-for-user-' . auth()->id());
            return response([
                'token' => $token->accessToken
            ]);
        }
        return response([
            'error' => 'اطلاعات کاربری اشتباه وارد شده است'
        ], 401);
    }

    public function logoutApi()
    {
        $user = auth('api')->user();
        $user->logOut();
        return $user;
    }

    public function currentUser()
    {
        return auth('api')->user();
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return response($user, 201);
    }

///////////// more example ////////////////////////////////////////////////////////////////////////////////
    public function postsList2(Request $request)
    {
        $articles = Post::paginate(2);
        /** @var JsonResponse $response */
        $response = (new PostResourceCollection($articles))
            ->additional(['adddddded' => '1234564', 'meta' => ['name' => 'webamooz.net']])
            ->toResponse($request);
        $response->header('Foo', 'BAR');
        $response->setStatusCode(202);
        return $response;
    }

///////////// posts ////////////////////////////////////////////////////////////////////////////////

    public function postsList()
    {
//        try {
//            return Post::all();
//        }
//        catch (\Exception $e){
//            return response(["error"=>$e->getMessage()],404);
//        }
//        dd(auth()->guard('api')->user());
        /**  we handle errore in Exeption/handler */
        $posts = Post::all();
        $posts = PostResource::collection($posts->load('user'));
        return $posts;
    }

//    get posts with pagination
    public function postsPagedList()
    {
        $posts = Post::paginate(2);
        $posts = PostResource::collection($posts);
//        $posts=new PostResourceCollection($posts);
        return $posts;
    }

    public function getPost(Request $request, $id)
    {
        $posts = Post::findOrFail($id);
        $posts = new PostResource($posts->load('user'));
        return $posts;
    }

    public function createPost(CreatePostRequest $request)
    {
//        php artisan make:request CreateRequest
        $data = $request->only(['title', 'body']);
        $user = User::find(2);
        $post = $user->posts()->create($data);
        return response($post, 201);
    }

    public function deletePost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response(null, 204);
//        204 : no content
    }

    public function updatePost(UpdatePostRequest $request, $id)
    {
dd($request->all());
        $data = $request->only(['title', 'body']);
        $post = Post::findOrFail($id);
        $post->update($data);
        return response($post, 202);
    }

/////// users ////////////////////////////////////////////////////////////////////////////////////
    public function usersList()
    {
//        return User::all();
        /*to return custom data with user*/
        $user = User::all();
//        $user=UserResource::collection($user->load('posts'));
        $user = new UserResourceCollection($user->load('posts'));
        return $user;
    }

    public function getUser(Request $request, $id)
    {
//        return User::findOrFail($id);
        /*to return custom data with user*/
        $user = User::findOrFail($id);
        $user = new UserResource($user->load('posts'));
        return $user;
    }

    public function createUser(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return response($user, 201);
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response(null, 204);
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $data = $request->only(['name', 'password']);
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user = User::findOrFail($id);
        $user->update($data);
        return response($user, 202);

    }

    public function download(){

        return file_get_contents(public_path("/flower-256.png"));
    }
}
