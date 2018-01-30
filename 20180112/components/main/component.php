<?php

/* @var array $pca Project Configuration Array */

$page = empty($_REQUEST['page']) ? 'home' : checkRequest($_REQUEST['page']);

$content = file_exists(CONTENTS_DIR . $page . '.php') ? $page . '.php' : 'home.php';
