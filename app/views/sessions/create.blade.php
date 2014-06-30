@extends('layouts.default')
@section('content')
<h3>Login</h3>

{{ Form::open(['action' => 'SessionsController@store']) }}
		<div>
			{{ Form::label('username', 'Username: ') }}
			{{ Form::text('username', Input::old('username')) }}
		</div>
		<div>
			{{Form::label('password', 'Password: ')}}
			{{Form::password('password')}}
		</div>
		<div>
			{{Form::submit("Login")}}
		</div>
	{{Form::close()}}

@stop