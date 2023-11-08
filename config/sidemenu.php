<?php

return [
    [
        'text' => '后台管理',
        'isHeader' => true,
    ],
    [
        'url' => '/',
        'text' => '数据大屏',
        'icon' => 'bi bi-cpu',
        'permission' => 'Visit Dashboard'
    ],
    [
        'isDivider' => true
    ],
    [
        'text' => '管理员管理',
        'isHeader' => true
    ],
    [
        'url' => '/admin/list',
        'text' => '管理员列表',
        'icon' => 'bi bi-cpu',
        'permission' => 'Admin List'
    ],
];
