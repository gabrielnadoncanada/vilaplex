<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Profiles
    |--------------------------------------------------------------------------
    |
    | You can add as many as you want of profiles to use it in your application.
    |
    */

    'profiles' => [

        'default' => [
            'plugins' => 'advlist autoresize codesample directionality emoticons fullscreen hr image imagetools link lists media table toc wordcount',
            'toolbar' => 'undo redo removeformat | formatselect fontsizeselect | bold italic | rtl ltr | alignjustify alignright aligncenter alignleft | numlist bullist | forecolor backcolor | blockquote table toc hr | image link media codesample emoticons | wordcount fullscreen',
            'upload_directory' => null,
        ],

        'simple' => [
            'plugins' => 'autoresize directionality emoticons link wordcount',
            'toolbar' => 'removeformat | bold italic | rtl ltr | link emoticons',
            'upload_directory' => null,
        ],

        'template' => [
            'plugins' => 'autoresize template',
            'toolbar' => 'template',
            'upload_directory' => null,
            'custom_configs' => [

            ],

        ],
        'heading-only' => [
            'plugins' => 'autoresize lists',
            'toolbar' => 'styleselect | bold italic underline strikethrough | alignjustify alignright aligncenter alignleft | bullist numlist',
            'upload_directory' => null,
            'custom_configs' => [
                'style_formats' => [
                    ['title' => 'Heading 1', 'format' => 'h1'],
                    ['title' => 'Heading 2', 'format' => 'h2'],
                    ['title' => 'Heading 3', 'format' => 'h3'],
                    ['title' => 'Heading 4', 'format' => 'h4'],
                    ['title' => 'Heading 5', 'format' => 'h5'],
                    ['title' => 'Heading 6', 'format' => 'h6'],
                    ['title' => 'border-text', 'block' => 'div', 'wrapper' => true, 'classes' => 'border-text'],
                    ['title' => 'subtitle', 'block' => 'div', 'wrapper' => true, 'classes' => 'subtitle'],

                ],
                'menubar' => false, // Optional: hides the menubar for a cleaner interface
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Custom Configs
        |--------------------------------------------------------------------------
        |
        | If you want to add custom configurations to directly tinymce
        | You can use custom_configs key as an array
        |
        */

        /*
          'default' => [
            'plugins' => 'advlist autoresize codesample directionality emoticons fullscreen hr image imagetools link lists media table toc wordcount',
            'toolbar' => 'undo redo removeformat | formatselect fontsizeselect | bold italic | rtl ltr | alignjustify alignright aligncenter alignleft | numlist bullist | forecolor backcolor | blockquote table toc hr | image link media codesample emoticons | wordcount fullscreen',
            'custom_configs' => [
                'allow_html_in_named_anchor' => true,
                'link_default_target' => '_blank',
                'codesample_global_prismjs' => true,
                'image_advtab' => true,
                'image_class_list' => [
                  [
                    'title' => 'None',
                    'value' => '',
                  ],
                  [
                    'title' => 'Fluid',
                    'value' => 'img-fluid',
                  ],
              ],
            ]
        ],
        */

    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    | You can add as many as you want of templates to use it in your application.
    |
    | https://www.tiny.cloud/docs/plugins/opensource/template/#templates
    |
    | ex: TinyEditor::make('content')->profiles('template')->template('example')
    */

    'templates' => [
        'example' => [
            [
                'title' => 'With an mce-clipboard marker',
                'description' => 'Some desc 2',
                'content' => '<div class="main-title title-center">
                        <div class="subtitle mb-20 fo">Contact</div>
							<h1 class="mb-20 fo h1">Do you have any questions?
                                <br>
                                <span class="border-text">Write us a message.</span>
                                <span class="animation-el"></span>
							</h1>
							<div class="text fo">
                                Lorem ipsum dolor sit amet, consectetur. <br>
                                Adipisicing elit suscipit, at.
							</div>
							<div class="scroll-hint-frame">
								<a class="scroll-hint smooth-scroll magnetic-link fo" href="#anchor">
									<span class="magnetic-object" ></span>
								</a>
                            <div class="label fo" >Scroll Down</div>
                        </div>
                    </div>',
            ],
        ],

    ],
];
