@extends('layouts.default')
@section('content')
	<h2>{{ ucfirst($question->user->username) }} asked a question: </h2>
	<p>
		{{ $question->question }}
	</p>
	<div id="answer">
		<h3>Answers</h3>

		@if(!$answers)
			<p>This question has not been answered yet.</p>
		@else
			<ul>
				@foreach($answers as $answer)
					<li>{{$answer->answer}} - by {{ucfirst($answer->user->username)}}</li>
				@endforeach
			</ul>
			{{$answers->links()}}
		@endif
	</div>
	<div id='post-answer'>
		<h3>Answer this question</h3>
		@if(!Auth::check())
			<p>Please log in to post an answer</p>
		@else

			{{ Form::open(['action' => 'AnswersController@store']) }}
				<div>
					{{Form::label('answer', 'Answer: ')}}
					{{Form::text('answer')}}
				</div>
					{{ Form::hidden('question_id', $question->id) }}
				<div>
					{{Form::submit('Create Anwser')}}
				</div>
			{{ Form::close() }}

		@endif
	</div>
@stop