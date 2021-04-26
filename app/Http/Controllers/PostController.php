<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->path());
        // dd($request->is('post/*'));
        // dd($request->url());
        // dd($request->fullUrl());
        // dd($request->method());
        // dd($request->isMethod('get'));

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
        // dd($request->input());
        // dd($request->only('title'));
        // dd($request->except('title'));
        // dd($request->has('name'));
        // dd($request->filled('title'));

        // dd($request->input());
        // dd($request->input('employees.0.first_name'));

        // dd($request->all());
        // dd($request->file('image'));
        // dd($request->file());
        // dd($request->hasFile('image'));
        // dd($request->file('image')->isValid());
        // dd($request->file('image')->getMimeType());

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $fileName);


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
