<?php
// Предназначен для удобной конфигурации страницы.
// Необходимо выбрать шаблон и по желанию установить дополнительные параметры.
// В итоге отображается шаблон, внутри которого отображается содержимое.
final class Page
{
	// отобразить шаблон
	public static function template()
	{
		System::template(self::get('template'));
	}
	// отобразить содержимое
	public static function content()
	{
		System::content(self::get('content'));
	}

	// данные
	private static $parameters = [
		'template' => 'default',
		'content' => 'default',

		'title' => 'Default',
		'logo' => 'Logo',
	];

	public static function get(string $key)
	{
		return self::$parameters[$key];
	}
	public static function set(string $key, $value)
	{
		self::$parameters[$key] = $value;
	}
}