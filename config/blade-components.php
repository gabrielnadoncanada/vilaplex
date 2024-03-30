<?php

use App\View\Components;

return [
    'components' => [
        'text' => [
            'class' => Components\Text::class,
            'themes' => [
                'p' => 'mry-text mry-fo',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'mry-mb-40 mry-fo',
                'h4' => 'h4',
                'h6' => 'h6',
            ],
        ],
    ],
];
