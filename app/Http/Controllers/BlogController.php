<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //

    public function getIndex(){
    	$posts = Post::paginate(10);

    	return view('blog.index')->withPosts($posts);
    } //func

	public function getSingle($slug){
		//fetch from the DB based on slug
		$post = Post::where('slug', '=', $slug)->first();
		//dd($post->title);
		//return the view and pass in the pass object
		return view('blog.single')->withPost($post);
	} //func

} //class
