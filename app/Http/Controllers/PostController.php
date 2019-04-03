<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
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
        
        $posts = Post::latest()->paginate(3);

        return view('posts.index')->withPosts($posts);

    } //index()

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //fetch all the categories
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);

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
        //dd($request)
        $this->validate($request, array( /* this keyword is a must use validate() function */

            'title' => 'required|max:500|min:3',
            'body'  => 'required|min:3|max:10000',
            'slug'  => 'required|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
        ));


        $post = new Post(); // create new object of model class 'Post' to work with this Model

        $post->title = $request->title; // inset the title from form into title of post object , same as body
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        $post->save(); // save the post into database with save() function
        $post->tags()->sync($request->tags, false);
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
        $post = Post::find($id);
        $categories = Category::all();
        /*$cats = array();

        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        } */

        return view('posts.edit')->withPost($post)->withCategories($categories);

    } //edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data from request

        $post =  Post::find($id);

        if($post->slug == $request->input('slug')){
            
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body'  => 'required',
                'category_id' => 'required|integer'
            ));
        } else {
            
            $this->validate($request, array(

                'title' => 'required|max:255',
                'slug'  => 'required|min:5|max:255|unique:posts,slug',
                'body'  => 'required',
                'category_id' => 'required|integer'

            ));

        } //else
        

        //Save the data to the database
        $post = Post::find($id);
        
        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body  = $request->input('body');
       
        $post->save();

        //set flash data with success message
        Session::flash('success', 'This post is successfully updated.');
        //redirect with flash data to the posts.show
        return redirect()->route('posts.show', $post->id);

    } //update

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');

        return redirect()->route('posts.index'); 

    }  //destroy
} //class
