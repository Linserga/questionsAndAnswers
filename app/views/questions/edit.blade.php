@extends('layouts.default')
@section('content')
	{{ Form::model($question, ['method' =>'PUT', 'action' => ['QuestionsController@update', $question->id]]) }}
		<div>
			{{ Form::label('question', 'Question: ')}}
			{{ Form::text('question')}}
		</div>
		<div>
			{{ Form::label('solved', 'Solved: ') }}
			{{ Form::checkbox('solved')}}
		</div>
		<div>
			{{ Form::submit("Update")}}			
		</div>
	{{ Form::close()}}
@stop