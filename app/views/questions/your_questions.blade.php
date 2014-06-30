@extends('layouts.default')
@section('content')
	<h2>{{ ucfirst($username) }} Questions</h2>

	@if(!$questions)
		<p>You've not posted any questions yet.</p>

	@else

		<ul>
			@foreach($questions as $question)
				<li>
					{{ Str::limit($question->question, 25) }} - 
					{{ $question->solved ? '(Solved)' : '(Unsolved)'}} - 
					{{ link_to_action('QuestionsController@edit', 'Edit', $question->id) }} - 
					{{ link_to_action('QuestionsController@show', 'View', $question->id) }}
				</li>
			@endforeach
		</ul>
		{{ $questions->links() }}
	@endif
@stop