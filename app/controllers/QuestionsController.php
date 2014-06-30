<?php

class QuestionsController extends \BaseController {

	public function __construct(){

		$this->beforeFilter('auth', ['only' => ['create', 'getyourQuestions', 'edit']]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /questions
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('questions.index')
		->withTitle("Make It Snappy Q&A")
		->withQuestions(Question::unsolved());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /questions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('questions.create')->withTitle("Make It Snappy Q&A");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /questions
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Question::validate(Input::all());

		if($validation->passes()){

			Question::create([
				'question' => Input::get('question'),
				'user_id' => Auth::id()
				]);

			return Redirect::to('/')->withMessage("Your question has been posted");
		}else{

			return Redirect::back()->withErrors($validation)->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id = null)
	{
		return View::make('questions.show')
		->withTitle("Make It Snappy Q&A")
		->with('question', Question::find($id))
		->withAnswers(Answer::where('question_id', $id)->paginate(3));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /questions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!Question::questionBelongsToUser($id)){

			return Redirect::to('your-questions')->withMessage("Invalid question");
		}else{

			return View::make('questions.edit')
			->withTitle("Make It Snappy Q&A - Edit")
			->withQuestion(Question::find($id));
		}

		
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$validation = Question::validate(Input::all());

		if($validation->passes()){

			$question = Question::find($id);
			
			$question->update([
				'question' => Input::get('question'),
				'solved' => Input::get('solved')
				]);

			return Redirect::to('/')->withMessage("Your question has been udpated");
		}else{

			return Redirect::back()->withErrors($validation)->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /questions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getYourQuestions(){

		return View::make('questions.your_questions')
		->withTitle("Make It Snappy Q&A - Your Questions")
		->withUsername(Auth::user()->username)
		->withQuestions(Question::yourQuestions());
	}

	public function search(){

		$keyword = Input::get('keyword');

		if(empty($keyword)){
			return Redirect::to('/');
		}else{
			return Redirect::to('results/'.$keyword);
		}

	}

	public function results($keyword){

		return View::make('questions.results')
		->withTitle("Make It Snappy Q&A - Search Results")
		->withQuestions(Question::search($keyword));
	}
}
