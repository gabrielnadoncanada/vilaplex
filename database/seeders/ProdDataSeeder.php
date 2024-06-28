<?php

namespace Database\Seeders;

use App\Models\Blog\Category as BlogCategory;
use App\Models\Blog\Post as BlogPost;
use App\Models\Navigation;
use App\Models\Page;
use App\Models\Service\Post as ServicePost;
use App\Models\User;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Seeder;

class ProdDataSeeder extends Seeder
{
    use CanCreateImages;

    public function run(): void
    {
        $this->seedUsers();
        $this->seedService();
        $this->seedBlog();
        $this->seedPage();
        $this->seedMenu();
    }

    private function seedUsers(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@vilaplex.ca',
            'password' => bcrypt('password'),
        ]);
    }

    private function seedService(): void
    {
        $posts = [
            [
                'title' => 'Gestion financière',
                'slug' => 'gestion-financiere',
                'text' => 'Supervision des finances de vos propriétés, incluant facturation, loyers, et optimisation des rendements immobiliers.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Service',
                                'subtitle_level' => 'span',
                                'heading_text' => "Gestion\nfinancière",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Supervision des finances de vos propriétés, incluant facturation, loyers, et optimisation des rendements immobiliers.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),
                ]
            ],
            [
                'title' => 'Gestion administrative',
                'slug' => 'gestion-administrative',
                'text' => 'Coordination et supervision des tâches administratives pour votre propriété, incluant gestion des locataires et contrats.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Service',
                                'subtitle_level' => 'span',
                                'heading_text' => "Gestion\nadministrative",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Coordination et supervision des tâches administratives pour votre propriété, incluant gestion des locataires et contrats.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),
                ]
            ],
            [
                'title' => 'Gestion opérationnelle',
                'slug' => 'gestion-operationnelle',
                'text' => 'Organisation quotidienne de la propriété, de la maintenance à la gestion locative, pour un fonctionnement optimal.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Service',
                                'subtitle_level' => 'span',
                                'heading_text' => "Gestion\nopérationnelle",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Organisation quotidienne de la propriété, de la maintenance à la gestion locative, pour un fonctionnement optimal.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),

                ]
            ]
        ];

        foreach ($posts as $post) {
            ServicePost::create([
                'title' => $post['title'],
                'slug' => $post['slug'],
                'text' => $post['text'],
                'image' => $this->createDefaultImage(),
                'content' => $post['content'] ?? [],
            ]);
        }
    }

    public function seedBlog(): void
    {
        $categories = BlogCategory::factory()->count(3)->create();
        BlogPost::factory()->count(50)
            ->hasAttached($categories->random(rand(1, 3))->first())
            ->create();
    }

    public function seedHomeSlider()
    {
        return [
            [
                'type' => 'slider',
                'data' => [
                    'slides' => [
                        [
                            'subtitle_text' => 'Service',
                            'subtitle_level' => 'span',
                            'heading_text' => "Gestion\nadministrative",
                            'heading_level' => 'h2',
                            'heading_size' => 'h1',
                            'text' => "<p>Coordination et supervision des tâches administratives pour votre propriété, incluant gestion des locataires et contrats.</p>",
                            'image' => $this->createDefaultImage(),
                            'buttons' => [
                                [
                                    'style' => 'primary',
                                    'action' => [
                                        'type' => 'App\\Models\\Service\\Post',
                                        'data' => [
                                            'label' => 'En savoir plus',
                                            'url' => '2',
                                            'target' => null
                                        ]
                                    ]
                                ],
                                [
                                    'style' => 'outline',
                                    'action' => [
                                        'type' => 'App\\Models\\Page',
                                        'data' => [
                                            'label' => 'Contactez-nous',
                                            'url' => '4',
                                            'target' => null
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        [
                            'subtitle_text' => 'Service',
                            'subtitle_level' => 'span',
                            'heading_text' => "Gestion\nfinancière",
                            'heading_level' => 'h2',
                            'heading_size' => 'h1',
                            'text' => "<p>Supervision des finances de vos propriétés, incluant facturation, loyers, et optimisation des rendements immobiliers.</p>",
                            'image' => $this->createDefaultImage(),
                            'buttons' => [
                                [
                                    'style' => 'primary',
                                    'action' => [
                                        'type' => 'App\\Models\\Service\\Post',
                                        'data' => [
                                            'label' => 'En savoir plus',
                                            'url' => '1',
                                            'target' => null
                                        ]
                                    ]
                                ],
                                [
                                    'style' => 'outline',
                                    'action' => [
                                        'type' => 'App\\Models\\Page',
                                        'data' => [
                                            'label' => 'Contactez-nous',
                                            'url' => '4',
                                            'target' => null
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        [
                            'subtitle_text' => 'Service',
                            'subtitle_level' => 'span',
                            'heading_text' => "Gestion\nopérationnelle",
                            'heading_level' => 'h2',
                            'heading_size' => 'h1',
                            'text' => "<p>Organisation quotidienne de la propriété, de la maintenance à la gestion locative, pour un fonctionnement optimal.</p>",
                            'image' => $this->createDefaultImage(),
                            'buttons' => [
                                [
                                    'style' => 'primary',
                                    'action' => [
                                        'type' => 'App\\Models\\Service\\Post',
                                        'data' => [
                                            'label' => 'En savoir plus',
                                            'url' => '3',
                                            'target' => null
                                        ]
                                    ]
                                ],
                                [
                                    'style' => 'outline',
                                    'action' => [
                                        'type' => 'App\\Models\\Page',
                                        'data' => [
                                            'label' => 'Contactez-nous',
                                            'url' => '4',
                                            'target' => null
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'pagination' => true,
                    'navigation' => true,
                    'template' => 'full-screen'
                ]
            ]
        ];

    }

    public function seedFooterSection()
    {
        return [
            [
                'type' => 'banner',
                'data' => [
                    'subtitle_text' => 'Contact',
                    'subtitle_level' => 'h2',
                    'heading_text' => "Avez-vous\nun projet ?",
                    'heading_level' => 'h2',
                    'heading_size' => 'h1',
                    'text' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, cupiditate?</p>",
                    'image' => $this->createDefaultImage(),
                    'buttons' => [
                        [
                            'style' => 'primary',
                            'action' => [
                                'type' => 'App\\Models\\Page',
                                'data' => [
                                    'label' => 'Contactez-nous',
                                    'url' => '4',
                                    'target' => null
                                ]
                            ]
                        ],

                    ]
                ]
            ]
        ];
    }

    private function seedPage(): void
    {
        $pages = [
            [
                'title' => 'Accueil',
                'slug' => 'accueil',
                'text' => 'Bienvenue sur notre site web.',
                'content' => [
                    'header_section' => $this->seedHomeSlider(),
                ],
            ],
            [
                'title' => 'Services',
                'slug' => 'services',
                'text' => 'Contactez-nous pour plus d\'informations.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Services',
                                'subtitle_level' => 'span',
                                'heading_text' => "Lorem ipsum dolor\nsit amet",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus urna, feugiat pretium nibh eu, luctus interdum risus. Cras augue lorem, varius se</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'content_section' => [
                        [
                            'type' => 'grid',
                            'data' => [
                                'layout_type' => 'boxed',
                                'columns' => 33,
                                'type' => 'dynamic',
                                'show_title' => true,
                                'show_text' => true,
                                'show_image' => true,
                                'show_lightbox' => true,
                                'dynamic_type' => 'App\\Models\\Service\\Post',
                                'order_by' => 'created_at',
                                'order_direction' => 'asc',
                                'limit' => 999,
                                'per_page' => 999,
                                'category_ids' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),
                ]
            ],
            [
                'title' => 'Blogue',
                'slug' => 'blogue',
                'text' => 'Contactez-nous pour plus d\'informations.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Blogue',
                                'subtitle_level' => 'span',
                                'heading_text' => "Lorem ipsum dolor\nsit amet",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus urna, feugiat pretium nibh eu, luctus interdum risus. Cras augue lorem, varius se</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'content_section' => [
                        [
                            'type' => 'grid',
                            'data' => [
                                'layout_type' => 'boxed',
                                'columns' => 33,
                                'type' => 'dynamic',
                                'show_title' => true,
                                'show_text' => true,
                                'show_image' => true,
                                'show_lightbox' => true,
                                'dynamic_type' => 'App\\Models\\Blog\\Post',
                                'order_by' => 'created_at',
                                'order_direction' => 'asc',
                                'limit' => 999,
                                'per_page' => 999,
                                'category_ids' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),
                ]
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'text' => 'Contactez-nous pour plus d\'informations.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Contact',
                                'subtitle_level' => 'span',
                                'heading_text' => "Lorem ipsum\ndolor sit amet\n",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus urna, feugiat pretium nibh eu, luctus interdum risus. Cras augue lorem, varius se</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'footer_section' => [],
                    'content_section' => null
                ]
            ],
            [
                'title' => 'À propos',
                'slug' => 'a-propos',
                'text' => 'Découvrez notre entreprise.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'À propos',
                                'subtitle_level' => 'span',
                                'heading_text' => "Lorem ipsum \ndolor sit amet",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus urna, feugiat pretium nibh eu, luctus interdum risus. Cras augue lorem, varius se</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),
                    'content_section' => null
                ]
            ],
        ];

        foreach ($pages as $page) {
            Page::create([
                'title' => $page['title'],
                'slug' => $page['slug'],
                'text' => $page['text'],
                'image' => $this->createDefaultImage(),
                'content' => $page['content'] ?? '[]',
            ]);
        }
    }

    public function seedMenu()
    {

        $menus = [
            [
                'title' => 'Main',
                'handle' => 'Main',
            ],
        ];

        foreach ($menus as $menu) {
            Navigation::create([
                'title' => $menu['title'],
                'handle' => $menu['handle'],
                'items' => json_decode('{"5b210326-2262-4b4b-b3a3-8e6ea60bebe7":{"type":"App\\\\Models\\\\Page","data":{"label":"Services","url":"2","target":null},"children":{"d59e555f-3fb5-4b66-a613-a2277692916a":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion op\u00e9rationnelle","url":"3","target":null},"children":[]},"42c55340-a8a2-406a-93cc-2747c8b81bf7":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion administrative","url":"2","target":null},"children":[]},"d804be45-fbdd-44f9-b29c-651d3f3ab47a":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion financi\u00e8re","url":"1","target":null},"children":[]}}},"e4747ea5-03ee-43f3-bade-1d2c2ef06067":{"type":"App\\\\Models\\\\Page","data":{"label":"Blogue","url":"3","target":null},"children":[]},"134a0c23-e266-4cfe-a5e7-57361aab25cc":{"type":"App\\\\Models\\\\Page","data":{"label":"\u00c0 propos","url":"5","target":null},"children":[]},"58027fba-1488-451d-b716-66bd57ee9386":{"type":"App\\\\Models\\\\Page","data":{"label":"Contact","url":"4","target":null},"children":[]}}
', true),
            ]);
        }
    }
}
