<?php

/* @var array $pca Project Configuration Array */

$page = empty($_REQUEST['page']) ? null : checkRequest($_REQUEST['page']);

if (empty($page)) {
    $content = 'home.php';
} else {
    switch ($page) {
        case 'about':
            $name_page = 'About';
            $content = 'other.php';
            break;
        case 'upload':
            $name_page = 'Upload';
            $content = 'upload.php';
            break;
        default:
            $content = 'home.php';
    }
}
