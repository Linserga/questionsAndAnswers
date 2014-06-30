<?php

class Base extends Eloquent {

	public static function validate($data){

		return $validator = Validator::make($data, static::$rules);
	}
}
