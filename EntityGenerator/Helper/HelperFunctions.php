<?php

namespace EntityGenerator\Helper;

class HelperFunctions{
	/* Capitalize the String name */
	public static function studlyCaps($string){
		return implode('',array_map('ucfirst',explode('_',strtolower($string))));
	}

	/* Capitalize the String name */
	public static function camelCase($string){
		$stringArray = explode('_',strtolower($string));
		$firstWord = (isset($stringArray)) ? $stringArray[0] : '';
		unset($stringArray[0]);
		return $firstWord.implode('',array_map('ucfirst',$stringArray));
	}
}