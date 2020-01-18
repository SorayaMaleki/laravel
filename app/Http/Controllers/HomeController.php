<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Post;

class HomeController extends BaseController
{
    public function index()
    {
        /** select data */
        //        $post = Post::find(1);
        //        $post = Post::find([1, 2]);
        //        dd($post);
        //        $result = Post::all();
        //        $result = Post::first();
        //        $result = Post::findOrFail(100);
        //        $result = Post::count();
        //        $result = Post::avg('id');
        //        $result = Post::where('id', '>', 5)->get();
        //        $result = Post::orderBy('id', 'DESC')->get();
        //        $result = Post::skip(50)->take(2)->get();
        //        $result = Post::groupBy('title')->having(DB::raw('count(*)'), '>', 1)->get();


        /** insert data */
        //        $post = new Post();
        //        $post->user_id = 1;
        //        $post->title = ' 2 یه عنوان الکی';
        //        $post->body = ' 2این هم متن اصلی پست هست';
        //        $post->body2 = ' 2این هم متن اصلی پست هست';
        //        $post->save();


        //        $post = Post::create([
        //            'user_id' => '1',
        //            'title' => 'عنوان 1',
        //            'body' => 'عنوان 2',
        //            'body2' => 'عنوان 2',
        //        ]);


        //        $post = new Post([
        //            'user_id' => '1',
        //            'title' => 'عنوان 1',
        //            'body' => 'عنوان 2',
        //           'body2' => 'عنوان 2',
        //        ]);
        //        $post->save();

        /** insert data of there is not */
        //        $post = Post::firstOrCreate([
        //            'user_id' => '10',
        //            'title' => 'foo',
        //            'body' => 'bar',
        //        ]);

        //        $post = Post::firstOrNew([
        //            'user_id' => '100',
        //            'title' => 'foo',
        //            'body' => 'bar',
        //        ]);
        //        $post->save();

        /** update data */
        //        $post = Post::find(1);
        //        $post->title = 'عنوان جدید 1';
        //        $post->save();


        //        $post = Post::where('id', 1)->update(['body' => 'بدنه جدید']);

        /** insert data of there is ( insert if there is not )*/
        //        $post = Post::updateOrCreate(
        //            [
        //                'user_id' => '33',
        //                'title' => 'foo',
        //                'body' => 'bar',
        //            ]);

        /** delete item */
        //        $post = Post::find(1);
        //        if ($post){
        //            $post->delete();
        //        }

        //        $post = Post::where('id', 2)->delete();


        //        $post = Post::destroy(3);
        //        $post = Post::destroy([3,40,50,60]);


        //        $post = Post::where('id', 6)->delete();
        //        $post = Post::find(6);

        /** show data with trashed */
        //        $post = Post::withTrashed()->get();

        /** show trashed date */
        //        $post = Post::onlyTrashed()->get();
        //        $post = Post::onlyTrashed()->where('id', 9)->get();

        /** undo delete */
        //        $post->restore();

        /** force delete while ew have soft delete */
        //        $post = Post::where('id', 6)->forceDelete();

        /** see sql */
        //        $post = Post::where('title', 'foo')->toSql();

        /** use custom global scope */
        /** post model:function idsGreaterThan15() */

        /** do not user custom global scope */
        //        $post = Post::withoutGlobalScopes()->where('title', 'foo')->toSql();
        //        $post = Post::withoutGlobalScope('idsGreaterThan15')->where('title', 'foo')->toSql();
        //        $post = Post::withoutGlobalScopes()->idsIn102030()->where('title', 'foo')->toSql();
        //        $post = Post::withoutGlobalScopes()->idsIn([10, 20, 30])->where('title', 'foo')->toSql();


//        dd($post);

    }
}
