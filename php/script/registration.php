<?php
if (Post::exist('login','password','email','name') == false)
{
	exit('Не все поля введены верно.');
}

System::using('user/regex');
use User\Regex as Regex;

if(!Regex::login(Post::value('login'), 4, 50))
{
	exit('Логин должен содержать от 4 до 50 латинских букв, а так же символов \'_\' и \'-\'.');
}
if(!Regex::password(Post::value('password'), 8, 32))
{
	exit("Пароль должен содержать:\nОт 8 до 32 латинских букв.\nОдну строчную букву.\nБукву в верхнем регистре.\nХотя бы одно число.");
}
if(!Regex::name(Post::value('name'), 2, 100))
{
	exit('Пожалуйста введите корректное имя.');
}
if(!Regex::email(Post::value('email'), 7, 100))
{
	exit('Пожалуйста введите корректный Email.');
}


System::using('user/cryptography');
use User\Cript as Cript;

$salt = Cript::salt(20, 0);
$password = Cript::password($salt, Post::value('password'));


System::using('bicycle/xml.db');
use Bicycle\XmlDB as DB;

$DB = new DB('user');
if (!$DB->insert(
	[
		'login' => Post::value('login'),
		'salt' => $salt,
		'password' => $password,
		'email' => Post::value('email'),
		'name' => Post::value('name'),
	],
	[
		'login',
		'email',
	]
))
{
	exit('Данный логин или электронная почта уже заняты.');
}