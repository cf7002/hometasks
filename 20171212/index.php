<?php

// подключение файла конфигурации
require_once './components/config.php';
// подключение библиотеки функций
require_once './lib/function_lib.php';
// подключение построителя каркаса
require_once './components/builder.php';
// подключение макета
require_once './components/layouts/main.php';

// инициализация массива компонентов макета страницы
$arr_components = [];
// инициализация массива сообщений
$arr_messages = [];
