<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index2()
    {
        // $users = User::find(30);
        // dd($users);
        // $users = User::all(['name', 'email']);

        // $users = User::where('id', '<', 35)->get();
        // $users = User::orderBy('id', 'desc')->take(5)->get();


        // $user = User::where('id', 28)->first();
        // $freshUser = $user->fresh();

        // $user = User::where('id', 28)->first();
        // $user->name = "hosein khare hahaha";
        // $user->refresh();
        // dd($user->name);

        // $user = User::find([28, 30, 35, 32, 33]);

        // try {
        //     $user = User::findOrFail(28);
        // } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        //     return response()->json('User Not Found', 500, [], JSON_UNESCAPED_UNICODE);
        // }
        // dd($user);

        // User::chunk(10, function ($users) {
        //     foreach ($users as $user) {
        //         echo $user->name . "<br />";
        //     }
        // });
        // dd();

        /** 48 */
        // foreach (User::where('created_at', '<', now())->cursor() as $user) {
        //     dd($user);
        // }


        // $post = new Post;
        // $post->title = 'my title for you 1';
        // $post->user_id = 28;
        // $post->save();


        // $post = new Post([
        //     'title' => 'my title for you 1',
        //     'user_id' => 35
        // ]);
        // $post->save();


        // $post = Post::make([
        //     'title' => 'my title for you 1',
        //     'user_id' => 35
        // ]);
        // $post->save();


        // $post = Post::create([
        //     'title' => 'my title for you 1',
        //     'user_id' => 35
        // ]);

        /** 49 : update */

        // $post = Post::find(2);
        // $post->title = 'New Title Fu*c';
        // $post->save();

        // $post = Post::where('id', 3)->update([
        //     'title' => "I updated You HAHAHAHHAAA",
        // ]);

        // $post = Post::find(14);
        // $post->update([
        //     'title' => 'I updated tou stupid',
        // ]);

        // $posts = Post::where('created_at', '<', now())->count();
        // $posts = Post::where('created_at', '<', now())->avg('id');
        // dd($posts);

        /** 50 : delete and softdelete */

        // $post = Post::firstOrCreate(
        //     ['title' => 'second New Title Fu*c', 'user_id' => 27],
        //     ['started_at' => now()]
        // );
        // dd($post);

        // $post = Post::find(15);
        // $post->delete();

        // $post = Post::destroy([12, 11]);

        // Post::where('user_id', 30)->delete();

        // softe delete

        // Post::destroy([10, 13]);

        // Post::all()->dd();
        // Post::withTrashed()->get()->dd();
        // Post::onlyTrashed()->get()->dd();

        // Post::onlyTrashed()->restore();

        // Post::onlyTrashed()->forceDelete();


        /** 51 */

        // Post::create([
        //     'title' => 'hahh titie',
        //     'user_id' => 28,
        // ]);

        /** 53 - 54 */
        // $posts= Post::active(1)->get();
        // $posts = Post::all();
        // dd($posts);


        // $user = User::find(27);
        // dd($user);

        // $user = new User;
        // $user->first_name = 'AliAkbar';
        // $user->email = '12@fafcxx.ca';
        // $user->password = '123456';
        // dd($user->save());

        /*** 55 ***/
        // $post = new Post;
        // $post->user_id = 27;
        // $post->title = 'Hello Title';
        // $post->status = '1';
        // $post->save();

        // $post  = Post::where('id', 22)->first();
        // dd(gettype($post->status)); 

        // $post  = Post::where('id', 22)->first();
        // dd($post->toArray()); 
        // dd($post->toJson()); 

    }


    public function index()
    {

        







        // return view('welcome', compact('user'));
    }







    /** 45 - 46 */
    // public function showUser(int $id)
    // {
    //     return User::find($id);
    // }

    // public function showUser(User $user)
    // {
    //     // impleset
    //     dd($user);
    // }

    // public function showUser(User $user)
    // {
    //     dd($user);
    // }

}
