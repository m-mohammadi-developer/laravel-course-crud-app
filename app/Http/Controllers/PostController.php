<?php

namespace App\Http\Controllers;

use App\Post;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $posts = Post::orderBy('id', 'desc')->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validator::make($request->all(), [
        //     'title' => 'required|min:5',
        //     'user_id' => 'required'
        // ], [
        //     'title.required' => 'عنوان پست اجباری است',
        //     'user_id.required' => 'یوزر باید وارد شود'
        // ])->validate();

        // if ($validator->fails()) {
        //     return back()->withErrors($validator);
        // }

        /*** ***/
        // $request->validate([
        //     'title' => 'required:min:5',
        //     'user_id' => 'required'
        // ]);

        // $request->validate([
        //     'title' => ['required', 'min:5', new Uppercase],
        //     'user_id' => 'required'
        // ]);


        // $request->validate([
        //     'title' => ['required', 'min:5', new Uppercase],
        //     'book.id' => 'required',
        //     'book.name' => 'required',
        // ]);


        
     

        Post::create($request->all());


        return redirect()->route('post.index')->with('success', 'Post Created SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
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
        $post->title = $request->title ?: $post->title;
        $post->user_id = $request->user_id ?: $post->user_id;
        
        return $post->save()
            ? redirect()->route('post.index')->with('success', 'Updated Successfully') 
            : redirect()->route('post.index')->with('success', 'Some Errors Happend');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->forceDelete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
