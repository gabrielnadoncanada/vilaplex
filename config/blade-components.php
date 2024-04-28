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
        'alert' => [
            'class' => Components\Alert::class,
            'themes' => [
                'success' => 'border-green-400 text-green-700',
                'error' => 'border-red-400 text-red-700',
                'warning' => 'border-yellow-400 text-yellow-700',
                'info' => 'border-blue-400 text-blue-700',
            ],
        ],
    ],
];
