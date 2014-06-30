<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Base implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = ['username', 'password'];

	public static $rules = [
		'username' => 'required|unique:users|alpha_dash|min:2',
		'password' => 'required|alpha_num|between:2,8|confirmed',
		'password_confirmation' => 'required|alpha_num|between:2,8'
	];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function questions(){

		return $this->hasMany('Question');
	}

	public function anwsers(){

		return $this->hasMany("Answer");
	}

}
