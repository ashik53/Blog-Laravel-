<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::all();

        return view('posts.index')->withPosts($posts);

    } //index()

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('posts.create');

    } //create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        

        $this->validate($request, array( /* this keyword is a must use validate() function */

            'title' => 'required|max:100|min:3',
            'body'  => 'required|min:3|max:500'
        ));


        $post = new Post(); // create new object of model class 'Post' to work with this Model

        $post->title = $request->title; // inset the title from form into title of post object , same as body
        $post->body = $request->body;

        $post->save(); // save the post into database with save() function

        //adding a flash session
        Session::flash('success', 'The blog post was successfully saved');

        
        return redirect()->route('posts.show', $post->id);

        


    } //store

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // only for a specific post
    {

        $post  = Post::find($id);
        return view('posts.show')->withPost($post);

    } //show

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}