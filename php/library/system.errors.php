<?php
// Обработка ошибок
final class Errors
{
	public static function invoke(int $code, string $status)
	{
		header("HTTP/1.0 $code $status");
		header("HTTP/1.1 $code $status");
		header("Status: $code $status");
		exit();
	}

	public static function code(int $code = 404)
	{
		$status = 'Not found';

		switch ($code)
		{
			default: $code = 404; break;
		}

		self::invoke($code, $status);
	}
}