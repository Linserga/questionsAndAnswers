@extends('layouts.default')
@section('content')
	<h3>Search results</h3>

	@if(count($questions) == 0)

		<p>Nothing found, please try a different search.</p>
	@else
		<ul>
			@foreach($questions as $question)
				<li>
					{{ link_to_action('QuestionsController@show', $question->question, $question->id)}}
					by {{ ucfirst($question->user->username)}}
				</li>
			@endforeach
		</ul>
		{{$questions->links()}}
	@endif
@stop
