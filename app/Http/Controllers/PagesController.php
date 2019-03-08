<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {

	public function getIndex(){

		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();

		return view('pages.welcome')->withPosts($posts);

	} //func

	public function getAbout(){

		$firstName = "Md. Ashik";
		$lastName = "Iqbal";

		$fullName = $firstName . " ". $lastName ;

		$email = "ashik@yahoo.com";

		$data = [];

		$data['email'] = $email;
		$data['fullName'] = $fullName;

		return view('pages/about')->withData($data);


	} //func

	public function getContact(){

		return view('pages.contact');

	} //func

} //class