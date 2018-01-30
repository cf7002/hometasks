<?php

// каталоги
define('TEMPLATES_DIR', './components/');
define('CONTENTS_DIR', './components/main/templates/');

// разделители
define('STR_SEPARATOR', '&');

/**
 * Project Configuration Array
 */
$pca = [
    'components' => [
        'header' => [
            'templates' => [
                'header.php',
                'navbar.php'
            ],
            'component.php'
        ],
        'main' => [
            'templates' => [
                'section.php',
            ],
            'component.php'
        ],
        'footer' => [
            'templates' => [
                'footer.php'
            ],
            'component.php'
        ]
    ],
    'main_menu' => [
        [
            'title' => 'Home',
            'page' => 'home',
        ],
        [
            'title' => 'Hello',
            'page' => 'hello',
        ],
        [
            'title' => 'Statistic',
            'page' => 'stat',
        ],
        [
            'title' => 'About',
            'page' => 'about',
        ],
    ],
];
