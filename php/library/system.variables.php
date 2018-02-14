<?php
final class Get
{
	private static $count;
	public static function count()
	{
		return (isset($count) ? $count : ($count = count($_GET)) );
	}

	public static function value(string $key, bool $specialchars = false) {
		return trim($specialchars ? htmlspecialchars($_GET[$key]) : $_GET[$key]);
	}
	public static function exist() {
		foreach (func_get_args() as $key)
		{
			if (!isset($_GET[$key]) || strlen($_GET[$key]) == 0)
				return false;
		}
		return true;
	}
	public static function set(string $key, $value)
	{
		$_GET[$key] = $value;
	}
}

final class Post
{
	private static $count;
	public static function count()
	{
		return (isset($count) ? $count : ($count = count($_POST)) );
	}

	public static function value(string $key, bool $specialchars = false) {
		return trim($specialchars ? htmlspecialchars($_POST[$key]) : $_POST[$key]);
	}
	public static function exist() {
		foreach (func_get_args() as $key)
		{
			if (!isset($_POST[$key]) || strlen($_POST[$key]) == 0)
				return false;
		}
		return true;
	}

	public static function set(string $key, $value)
	{
		$_POST[$key] = $value;
	}
}