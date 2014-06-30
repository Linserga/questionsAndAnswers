<?php

class Answer extends Base {
	protected $fillable = ['answer', 'question_id', 'user_id'];

	public static $rules = [

		'answer' => 'required'
	];

	public function user(){

		return $this->belongsTo('User');
	}

	public function question(){

		return $this->belongsTo('Question');
	}
}