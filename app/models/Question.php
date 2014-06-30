<?php

class Question extends Base {
	protected $fillable = ['question', 'user_id', 'solved'];

	protected static $rules = [
		'question' => 'required|min:2|max:255',
		'solved' => 'in:0,1'
	];

	public function user(){

		return $this->belongsTo('User');
	}

	public function anwsers(){

		return $this->hasMany('Answer');
	}

	public static function unsolved(){

		return Question::where('solved', '0')->orderBy('id', 'DESC')->paginate(3);
	}

	public static function yourQuestions(){

		return static::where('user_id', Auth::id())->paginate(3);
	}

	public static function search($keyword){

		return static::where('question', 'LIKE', '%'.$keyword.'%')->paginate(3);
	}

	public static function questionBelongsToUser($id){ 

		$question = Question::find($id);

		return $question->user_id == Auth::id() ? true : false;

	}
}