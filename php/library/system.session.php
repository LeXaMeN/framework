<?php
// работа с сессией
final class Session {
	public static function start()
	{
		session_start();
	}

	public static function id()
	{
		return session_id();
	}
	public static function name()
	{
		return session_name();
	}


	public static function set(string $name, $value)
	{
		$_SESSION[$name] = $value;
	}
	public static function exist()
	{
		foreach (func_get_args() as $name)
		{
			if (!isset($_SESSION[$name]))
				return false;
		}
		return true;
	}
	public static function get(string $name)
	{
		return $_SESSION[$name];
	}


	public static function destroy()
	{
		$_SESSION = array();
		// уничтожение куки с идентификатором сессии
		if (session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time()-2592000, '/');
		
		session_destroy();
	}
}