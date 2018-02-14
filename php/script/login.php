<?php
if (Post::exist('login','password') == false)
{
	exit('Не все поля введены верно.');
}

System::using('user/regex');
use User\Regex as Regex;

if(!Regex::login(Post::value('login'), 4, 50))
{
	exit('Неверный логин.');
}
if(!Regex::password(Post::value('password'), 8, 32))
{
	exit('Неверный пароль.');
}


System::using('bicycle/xml.db');
use Bicycle\XmlDB as DB;

$DB = new DB('user');
$user = $DB->select(['login' => Post::value('login')]);
if (count($user) == 0)
{
	exit('Пользователя с таким логином не существует.');
}


System::using('user/cryptography');
use User\Cript as Cript;

$salt = $user['salt'];
$password = Cript::password($salt, Post::value('password'));

if ($password != $user['password']) {
	exit('Неверный пароль!');
}

Session::start();
foreach ($user as $key => $value) {
	Session::set($key, $value);
}