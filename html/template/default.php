<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=Page::get('title')?> - <?=Config::site['name']?></title>
	<base href="<?=Config::site['url']?>" />
	<meta charset="<?=Config::site['charset']?>" />

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="css/materialize.fix.css" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/<?=Page::get('path')?>.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<header>
		<nav class="nav-extended green">
			<div class="nav-wrapper">
				<div class="container">
					<a href="/" class="site-logo"><?=Config::site['logo']?></a>
					<ul class="right">
						<li>
							<a href="/user/login">
								<span class="hide-on-med-and-down">Авторизоваться</span>
								<i class="material-icons hide-on-large-only" title="Войти">person</i>
							</a>
						</li>
						<li>
							<a href="/user/registration">
								<span class="hide-on-med-and-down">Зарегистрироваться</span>
								<i class="material-icons hide-on-large-only" title="Войти">person_add</i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<?php Page::content(); ?>
	</main>
	<footer class="page-footer green">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Регистрация</h5>
					<p class="grey-text text-lighten-4">Создание своей учетной записи или, иными словами, заведение своего персонального имени (логина), которое будет отличать вас от всех остальных.</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Ссылки</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="/user/registration">Регистрация</a></li>
						<li><a class="grey-text text-lighten-3" href="/user/login">Авторизация</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© <?=date('Y')?> Все права сохранены.
				<a class="grey-text text-lighten-4 right" href="/user/registration">Повторная регистрация</a>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/<?=Page::get('path')?>.js"></script>
</body>
</html>