<?php
// работа с куками
final class Cookie
{
	public static function set (string $name, string $value, int $expire = 0) 
	{
		return setcookie($name, $value, $expire);
	}
	public static function exist() 
	{
		foreach (func_get_args() as $name) 
		{
			if (!isset($_COOKIE[$name]))
				return false;
		}
		return true;
	}
	public static function get(string $name)
	{
		return $_COOKIE[$name];
	}


	public static function setArray(string $name, array $array)
	{
		foreach($array as $key => $value)
		{
			setcookie("{$name}[{$key}]", $value);
		}
	}

}