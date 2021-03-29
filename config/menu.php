<?php

return [
    'graphics' => [
        'icon' => 'chart-bar',
        'route_name' => 'app.graphic.index',
        'title' => 'Gráficos',
        'permissions' => [
            'app.graphic.index' => 'DashBoard'
        ]
    ],
    'menu-register' => [
        'icon' => 'plus',
        'title' => 'Cadastros',
        'group_name' => 'register',
        'sub_menu' => [
            'levels' => [
                'route_name' => 'register.operator.index',
                'title' => 'Operadores',
                'permissions' => [
                    'register.operator.index' => 'Item Cadastrados',
                    'register.operator.create' => 'Novo',
                    'register.operator.edit' => 'Editar',
                    'register.operator.delete' => 'Deletar'
                ],
            ],
        ]
    ]
];
