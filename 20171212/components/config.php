<?php

// директории загрузки пользовательских файлов
define('DIR_USER_IMG', '/uploads/img');
define('DIR_USER_DOC', '/uploads/doc');

define('SECTION_IMG', 'img');
define('SECTION_DOC', 'doc');

// типы сообщений
define('MSG_SUCCESS', 'success');
define('MSG_DANGER', 'danger');
define('MSG_WARNING', 'warning');
define('MSG_INFO', 'info');

// разделители
define('STR_SEPARATOR', '&');

/**
 * Project Configuration Array
 *
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
                'aside.php',
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
            'href' => 'index.php'
        ],
        [
            'title' => 'Upload',
            'href' => 'index.php?page=upload'
        ],
        [
            'title' => 'About',
            'href' => 'index.php?page=about'
        ],
//    [
//        'title' => 'Community',
//        'href' => '#',
//        'items' => [
//            [
//                'title' => 'Forums',
//                'href' => '#',
//                'items' => [
//                    [
//                        'title' => 'Forum A',
//                        'href' => 'index.php?page=forums'
//                    ],
//                    [
//                        'title' => 'Forum B',
//                        'href' => 'index.php?page=forums'
//                    ],
//                    [
//                        'title' => 'Forum C',
//                        'href' => 'index.php?page=forums'
//                    ],
//                ]
//            ],
//            [
//                'title' => 'Partners',
//                'href' => 'index.php?page=partners'
//            ],
//            [
//                'title' => 'Terms &amp; Conditions',
//                'href' => 'index.php?page=terms'
//            ],
//        ]
//    ],
    ],
    'file_types' => [
        SECTION_IMG => [
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png',
        ],
        SECTION_DOC => [
            'txt' => 'text/plain',
            'rtf' => 'text/rtf',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'pps' => 'application/vnd.ms-powerpoint',
            'xls' => 'application/vnd.ms-office',

        ],
    ],
    'max_file_size' => 2097152,
];
