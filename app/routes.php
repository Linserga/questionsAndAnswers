<?php

Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::get('register', 'UsersController@create');

Route::get('your-questions', 'QuestionsController@getYourQuestions');

Route::get('/', 'QuestionsController@index');

Route::get('results/{all}', 'QuestionsController@results');


Route::post('search', 'QuestionsController@search');



Route::resource('users', 'UsersController');

Route::resource('sessions', 'SessionsController', ['only' => ['store', 'create', 'destroy']]);

Route::resource('questions', 'QuestionsController', ['except' => ['create']]);

Route::resource('answers', 'AnswersController', ['only' => ['store']]);
