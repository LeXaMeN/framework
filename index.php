<?php
// подключаем ядро системы
require_once $_SERVER['DOCUMENT_ROOT'].'/php/library/system.php';

// парсим url
$path = parse_url($_GET['path'], PHP_URL_PATH);
if (!isset($path) || trim($path) === '')
{
	$path = 'default';
}
unset($_GET['path']);

// Если запрос AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
	System::script($path);
}
else
{
	// устанавлием путь для страницы
	Page::set('path', $path);
	// находим и загружаем конфигурационный файл страницы, по умолчанию default.php в папке page
	System::require(__ROOT__.'/page/'.$path.'.php', true);
	// подключаем шаблон страницы
	Page::template();
}
?>