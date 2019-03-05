<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function getIndex(){

		return view('pages/welcome');

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