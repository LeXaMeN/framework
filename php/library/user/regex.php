<?php
// Регулярные варажения для пользователя
namespace User;

class Regex
{
	public static function login(string $value, int $min, int $max)
	{
		return preg_match("/^([A-Za-z\d]|_(?!_)|\-(?!\-)){".$min.",".$max."}$/", $value);
	}
	public static function password(string $value, int $min, int $max)
	{
		return preg_match("/^(?=.*[az])(?=.*[AZ])(?=.*\d)[a-zA-Z\d]{".$min.",".$max."}$/", $value);
	}
	public static function name(string $value, int $min, int $max)
	{
		return preg_match("/^([a-zA-Zа-яА-Я]| (?! )){".$min.",".$max."}+$/ui", $value);
	}
	public static function email(string $value, int $min, int $max)
	{
		return preg_match("/^.{".$min.",".$max."}+$/", $value) && filter_var($value, FILTER_VALIDATE_EMAIL);
	}
}