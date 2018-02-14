<?php
// конфигурация системы
final class Config
{
	const database = [
		'host' => 'localhost',
		'dbname' => 'site',
		'user' => 'site_root',
		'password' => 'qwe123',
	];

	// глобальные переменные сайта
	const site = [
		'url' => 'http://site.loc',
		'name' => 'Бесплатная регистрация, без регистрации и смс',
		'logo' => 'RegFree',
		'charset' => 'UTF-8',
	];

	// ключи путей

	// шаблоны
	const template = [
		'default' => 'default.php',
	];

	// содержимое
	const content = [
		'default' => 'default.php',
		// пользователь
		'user.registration' => 'user/registration.php',
		'user.login' => 'user/login.php',
	];

	// элементы
	const element = [

	];

	// скрипты php
	const script = [
		'user.registration' => 'registration.php',
		'user.login' => 'login.php',
	];
}