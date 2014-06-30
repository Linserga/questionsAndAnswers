<?php

class SessionsController extends \BaseController {

	public function create()
	{
		return View::make('sessions.create')->withTitle("Make It Snappy Q&A");
	}

	public function store()
	{
		$input = Input::all();

		$attempt = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password']

			]);		

		if($attempt)return Redirect::intended('/')->withMessage("You have been logged in");

		return Redirect::back()->withMessage("Wrong credentials")->withInput();
	}	

	public function destroy()
	{
		Auth::logout();

		return Redirect::to('login')->withMessage("You are logged out");
	}

}