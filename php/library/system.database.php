<?php
// надстройка для уобной работы с бд
final class Database
{
	// https://redbeanphp.com/index.php?p=/connection
	public static function open()
	{
		System::import('redbeanphp', 'rb-mysql.php');

		R::setup(
			"mysql:host={Config::database['host']};dbname={Config::database['dbname']}",
			Config::database['user'], Config::database['password']
		);
	}
	public static function close() {
		if (class_exists('R')) {
			R::close();
		}
	}

	// http://gabordemooij.com/index.php?p=/tiniest_query_builder
	public static function query($pieces) 
	{
		$sql = '';
		$glue = NULL;
		foreach( $pieces as $piece ) {
			$n = count( $piece );  
			switch( $n ) {
				case 1:
				$sql .= " {$piece[0]} ";
				break;
				case 2:
				$glue = NULL;
				if (!is_null($piece[0])) $sql .= " {$piece[1]} ";
				break;
				case 3:
				$glue = ( is_null( $glue ) ) ? $piece[1] : $glue;
				if (!is_null($piece[0])) { 
					$sql .= " {$glue} {$piece[2]} ";
					$glue = NULL;
				}
				break;
			}
		}
		return $sql;
	}
}