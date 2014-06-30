<?php

class AnswersController extends \BaseController {


	public function __construct(){

		$this->beforeFilter('auth',['only' => 'create']);
	}
	/**
	 * Display a listing of the resource.
	 * GET /answers
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /answers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /answers
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Answer::validate(Input::all());

		if($validation->passes()){

			Answer::create([

				'answer' => Input::get('answer'),
				'user_id' => Auth::id(),
				'question_id' => Input::get('question_id')

				]);

			return Redirect::back()->withMessage("Your answer have been posted.");
		}else{

			return Redirect::back()->withErrors($validation)->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /answers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /answers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}