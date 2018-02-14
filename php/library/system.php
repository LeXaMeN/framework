<?php
header("Content-type: text/html; charset=UTF-8");
define('__ROOT__', $_SERVER['DOCUMENT_ROOT']);

final class System
{
	// стандартная функция
	public static function require(string $path, bool $once)
	{
		if (is_file($path)) {
			if ($once)
				require_once $path;
			else
				require $path;
		}
		else {
			exit('Not found '.$path);
		}
	}

	// использовать библиотеку
	public static function using(string $name)
	{
		self::require(__ROOT__.'/php/library/'.$name.'.php', true);
	}
	// импортировать сторонний плагин
	public static function import(string $folder, string $fileName)
	{
		self::require(__ROOT__.'/php/plugin/'.$folder.'/'.$fileName.'.php', true);
	}

	// PHP
	public static function script($key)
	{
		self::require(__ROOT__.'/php/script/'.Config::script[$key], false);
	}

	// HTML
	public static function template($key)
	{
		self::require(__ROOT__.'/html/template/'.Config::template[$key], true);
	}
	public static function content($key)
	{
		self::require(__ROOT__.'/html/content/'.Config::content[$key], true);
	}
	public static function element($key)
	{
		self::require(__ROOT__.'/html/element/'.Config::element[$key], false);
	}
}

System::using('system.errors');
System::using('system.config');
System::using('system.cookie');
System::using('system.session');
System::using('system.variables');
System::using('system.database');
System::using('system.page');