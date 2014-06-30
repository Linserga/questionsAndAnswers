<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
	{{ HTML::style('/css/main.css') }}
	{{ HTML::script('/js/application.js') }}
	<meta charset="utf-8">
</head>
<body>
	<div id="container">
		<header>
			{{ link_to('/', 'Make It Snappy Q&A') }}
			<div id='searchbar'>
				{{ Form::open(['action' => 'QuestionsController@search']) }}
					{{Form::text('keyword', 'Search', ['id' => 'keyword'])}}
					{{Form::submit('Search')}}
				{{ Form::close()}}
			</div>
		</header>
		<nav>
			<ul>
				<li>{{ link_to('/', 'Home') }}</li>
				@if(!Auth::check())
					<li>{{ link_to_action('UsersController@create', 'Register') }}</li>
					<li>{{ link_to('login', 'Login') }}</li>
				@else
					<li>{{ link_to('your-questions', "Your Questions") }}
					<li>{{link_to('logout', 'Logout (' . Auth::user()->username. ')')}}</li>
				@endif
			</ul>
		</nav>
		<main>
			@if(Session::has('message'))
				<p id="message">{{ Session::get('message') }}</p>
			@endif

			@include('_partials.errors')

			@yield('content')
		</main>
		<footer>
			&copy; Make It Snappy Q&A {{ date('Y') }} 
		</footer>
	</div><!-- end container -->
</body>
</html>