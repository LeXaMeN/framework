<?php
Page::set('template', 'default');
Page::set('content', 'default');

Page::set('title', 'Главная');

Session::start();
Page::set('user_name', (Session::exist('name') ? Session::get('name') : 'Незнакомец'));