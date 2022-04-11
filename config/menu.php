<?php
return [
    [
        'title'=> 'На главную',
        'route' => 'index',
        'child' => ['index']
    ],
    [
        'title'=> 'Каталог статей',
        'route' => 'articles',
        'child' => ['articles', 'post']
    ]
];
