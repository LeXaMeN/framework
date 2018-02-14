<?php
// Добавление соли к паролю
namespace User;

class Cript
{
	public static function salt($chars, $special)
	{
		return str_shuffle(
			substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $chars) .
			substr(str_shuffle(',;:!?.$/*-+&@_+;./*&?$-!,'), 0, $special)
		);
	}
	public static function password($salt, $value)
	{
		return sha1($salt.$value);
	}
}