@extends('layouts.default')
@section('content')
	<h2>Register<h2>

	{{ Form::open(['action' => 'UsersController@store']) }}
		<div>
			{{Form::label('username', 'Username: ')}}
			{{Form::text('username'), Input::old('username')}}
		</div>
		<div>
			{{Form::label('password', 'Password: ')}}
			{{Form::password('password')}}
		</div>
		<div>
			{{Form::label('password_confirmation', 'Confirm password: ')}}
			{{Form::password('password_confirmation')}}
		</div>
		<div>
			{{Form::submit('Create user')}}
		</div>
	{{ Form::close() }}
@stop