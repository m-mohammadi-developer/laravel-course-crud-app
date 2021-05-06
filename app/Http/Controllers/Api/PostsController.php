<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Post as PostResource;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $posts = Post::all();
        // $posts = Post::paginate(2);
        // return $posts;

        // $sortColumn = $request->input('sort', 'id');
        // $sortDirection = Str::startsWith($sortColumn, '-') ? 'desc' : 'asc';
        // $sortColumn = ltrim($sortColumn, '-');
        // return Post::orderBy($sortColumn, $sortDirection)->paginate(2);

        // return new PostResource(Post::find(1));
        return new PostCollection(Post::with('comments')->get());
        // return Post::find(1);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Post::create([
            'title' => $request->title,
            'user_id' => $request->user_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id)->comments;
        // return new PostResource(Post::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->only(['title']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        // return response('Success', 200)->header('Content-Type', 'text/plain');

        return response()->json([
            'status' => 200,
            'message' => 'Success',
        ]);
    }
}
