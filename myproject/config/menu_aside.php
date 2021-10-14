<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Thông tin tài khoản',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Nội dung
        [
            'section' => 'NỘI DUNG WEBSIDE',
        ],
        [
            'title' => 'Quản lý bài viết',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Tất cả bài viết',
                    'bullet' => 'dot',
                    'page' => '/home',
                ],
                [
                    'title' => 'Danh mục bài viết',
                    'bullet' => 'dot',
                    'page' => '/groups',
                ],

            ]
        ],
        [
            'title' => 'Quản lý quảng cáo',
            'icon' => 'media/svg/icons/Shopping/Barcode-read.svg',
            'bullet' => 'dot',
            'root' => true,
            'page' => '/advertisement'

        ]

    ]

];
