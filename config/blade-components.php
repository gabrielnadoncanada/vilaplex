<?php

use App\View\Components;

return [
    'components' => [

        'text' => [
            'class' => Components\Text::class,
            'themes' => [
                'default' => 'text-sm/[20px] md:text-base/[22px]',
                'label' => 'text-[10px]/[15px] md:text-[11px]/[15px] font-bold pt-[3px] tracking-[2px] uppercase mb-1 block',

                'subtitle' => [
                    'default' => 'relative text-[11px] uppercase font-semibold text-[#424242] tracking-[2px] pl-10 before:content-[""] before:w-[30px] before:h-[3px] before:bg-[color:var(--primary)] before:absolute before:top-[calc(50%_-_4px)] before:rounded-[3px] before:left-0',
                    'center' => 'before:ml-[-15px] before:left-2/4 before:top-0 relative text-[11px] uppercase leading-[16px] font-semibold text-[#424242] pt-[20px] tracking-[2px] before:content-[""] before:w-[30px] before:h-[3px] before:bg-[color:var(--primary)] before:absolute before:top-0 before:rounded-[3px] before:left-0',
                ]
            ],
        ],
        'button' => [
            'class' => Components\Button::class,
            'themes' => [
                'primary' => 'cursor-pointer relative inline-block no-underline h-[55px] leading-[55px] text-[11px] uppercase font-semibold tracking-[2px] text-[#0d0d0d] bg-transparent transition-[0.4s] duration-[ease-in-out] mr-2.5 px-10 py-0 hover:text-[color:var(--primary)] rounded-[3px] border-[2px] border-[solid] border-[#0d0d0d]',
                'outline' => 'border-transparent cursor-pointer relative inline-block no-underline h-[55px] leading-[55px] text-[11px] uppercase font-semibold tracking-[2px] text-[#0d0d0d] bg-transparent transition-[0.4s] hover:text-[color:var(--primary)] duration-[ease-in-out] mr-2.5 px-10 py-0 rounded-[3px] border-[none] border-[solid] border-[#0d0d0d]',
            ],
        ],

    ],
];
