@extends('layouts.default')

@section('content')
	<div id="ask">
		<h2>Ask a Question</h2>

	@if(Auth::check())
		{{ Form::open(['action' => 'QuestionsController@store']) }}
		<div>
			{{ Form::label('question', 'Question: ') }}
			{{ Form::text('question', Input::old('question')) }}
		</div>		
		<div>
			{{Form::submit("Ask")}}
		</div>
	{{Form::close()}}
	@else
		<p>Please, login to ask or anser questions</p>
	@endif
	</div>
	<div id="questions">
		<h3>Usolved Questions</h3>
		@if(!$questions)
			<p>No questions have been asked.</p>
		@else
			<ul>
				@foreach($questions as $question)
					<li>
					{{ link_to_action('QuestionsController@show', Str::limit($question->question, 25), $question->id )}} 
					by {{ $question->user->username }}				
					</li>
				@endforeach
			</ul>
			{{ $questions->links() }}
		@endif
	</div>
@stop