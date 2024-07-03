<?php

use App\View\Components;

return [
    'components' => [
        'text' => [
            'class' => Components\Text::class,
            'themes' => [
                'default' => 'text-main text-[16px]/[20px] md:text-base/[22px]',
                'label' => 'text-main text-[10px]/[15px] md:text-[11px]/[15px] font-bold pt-[3px] tracking-[2px] uppercase mb-1 block',
                'h1' => 'relative text-foreground m-0 p-0 text-[38px] md:text-7xl leading-none font-black',
                'h2' => 'relative text-foreground m-0 p-0 text-[32px] md:text-5xl leading-none font-black',
                'h3' => 'relative text-foreground m-0 p-0 text-[28px] leading-[30px] md:text-[32px] md:leading-10 font-black',
                'h4' => 'relative text-foreground m-0 p-0 text-xl leading-[22px] md:text-[22px] md:leading-[30px] font-black',
                'h5' => 'relative text-foreground m-0 p-0 text-sm',
                'h6' => 'relative text-foreground m-0 p-0 text-sm',
                'subtitle' => [
                    'default' => 'relative text-[11px] uppercase font-semibold text-main tracking-[2px] pl-10 before:content-[""] before:w-[30px] before:h-[3px] before:bg-primary before:absolute before:top-[calc(50%_-_4px)] before:rounded-[3px] before:left-0',
                    'center' => 'before:ml-[-15px] before:left-2/4 before:top-0 relative text-[11px] uppercase leading-[16px] font-semibold text-main pt-[20px] tracking-[2px] before:content-[""] before:w-[30px] before:h-[3px] before:bg-primary before:absolute before:top-0 before:rounded-[3px] before:left-0',
                ]
            ],
        ],
        'button' => [
            'class' => Components\Button::class,
            'themes' => [
                'default' => 'default-link cursor-pointer relative inline-block no-underline h-[55px] leading-[55px] text-[11px] uppercase font-semibold tracking-[2px] text-foreground-dark bg-transparent duration-400 ease-in-out mr-2.5 px-10 py-0 hover:text-primary rounded-[3px] border-[2px] border-solid border-foreground-dark',
                'outline' => 'default-link border-transparent cursor-pointer relative inline-block no-underline h-[55px] leading-[55px] text-[11px] uppercase font-semibold tracking-[2px] text-foreground-dark bg-transparent duration-400 hover:text-primary ease-in-out mr-2.5 px-10 py-0 rounded-[3px] border-none border-solid border-foreground-dark',
            ],
        ],
        'form' => [
            'class' => Components\Form::class,
            'field' => [
                'class' => Components\Form\Field::class,
                'themes' => [
                    'default' => '',
                ],
            ],
            'input' => [
                'class' => Components\Form\Input::class,
                'themes' => [
                    'default' => [
                        'normal' => 'placeholder:opacity-80 placeholder:h-full placeholder:font-light  focus:border-primary h-[55px] text-foreground default-link w-full bg-transparent transition-[0.4s] ease-in-out mb-[5px] pl-5 border-[2px] rounded-sm border-solid border-[#010d0d]',
                        'multiple' => '',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'label' => [
                'class' => Components\Form\Label::class,
                'themes' => [
                    'default' => 'text-foreground mb-2.5 inline-block uppercase text-[11px] font-semibold tracking-[2px] leading-[15px] pt-[3px]',
                ],
            ],
            'legend' => [
                'class' => Components\Form\Legend::class,
                'themes' => [
                    'default' => '',
                ],
            ],
            'radio' => [
                'class' => Components\Form\Radio::class,
                'themes' => [
                    'default' => [
                        'normal' => '',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'select' => [
                'class' => Components\Form\Select::class,
                'themes' => [
                    'default' => [
                        'normal' => '',
                        'multiple' => '',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'textarea' => [
                'class' => Components\Form\Textarea::class,
                'themes' => [
                    'default' => [
                        'normal' => 'placeholder:opacity-80 placeholder:h-full placeholder:font-light focus:border-primary pt-[15px] w-full bg-transparent transition-[0.4s] ease-in-out mb-[5px] pl-5 border-[2px] rounded-sm border-solid border-[#010d0d]',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'checkbox' => [
                'class' => Components\Form\Checkbox::class,
                'themes' => [
                    'default' => [
                        'normal' => '',
                        'invalid' => '',
                        'disabled' => '',
                    ],
                ],
            ],
            'error' => [
                'class' => Components\Form\Error::class,
                'themes' => [
                    'default' => "opacity-100 text-[10px] font-semibold uppercase border bg-[red] text-[white] list-none opacity-0 mx-0 -mt-[5px] pl-[3px] pr-0  pb-0 border-solid border-[red] before:content-[''] before:block before:mt-[-9px] before:pointer-events-none before:absolute before:border-b-[solid] before:border-b-[red] before:border-x-[solid] before:border-x-transparent"
                ],
            ],
        ],
    ],
];
