<?php

namespace Database\Seeders;

use App\Enums\PublishedStatus;
use App\Models\Blog\Category as BlogCategory;
use App\Models\Blog\Post as BlogPost;
use App\Models\Navigation;
use App\Models\Page;
use App\Models\Service\Post as ServicePost;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProdDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedUsers();
        $this->seedService();
        //        $this->seedBlog();
        $this->seedPage();
        $this->seedMenu();

    }

    private function seedUsers(): void
    {
        User::unsetEventDispatcher();

        User::factory(1)->create([
            'name' => 'Admin',
            'email' => 'admin@vilaplex.ca',
        ]);
    }

    private function seedService(): void
    {
        $posts = [
            [
                'title' => 'Gestion financière',
                'slug' => 'gestion-financiere',
                'description' => 'Supervision des finances de vos propriétés, incluant facturation, loyers, et optimisation des rendements immobiliers.',
                'content' => '{"header_section":[{"type":"banner","data":{"subtitle":"Service","title":"Gestion\nfinanci\u00e8re","description":"<p>Supervision des finances de vos propri\u00e9t\u00e9s, incluant facturation, loyers, et optimisation des rendements immobiliers.<\/p>","image":"01J0M7CG5ERYWFMPDT81D06ZCZ.webp"}}],"footer_section":[{"type":"banner","data":{"subtitle":"Contact","title":"Avez-vous\nun projet ?\n","description":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, cupiditate?<\/p>","image":"01J0M7CG5F3WZMWAB55YHCGK94.webp","primary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}},"secondary_action":{"type":null,"data":null}}}],"content_section":null}',
            ],
            [
                'title' => 'Gestion administrative',
                'slug' => 'gestion-administrative',
                'description' => 'Coordination et supervision des tâches administratives pour votre propriété, incluant gestion des locataires et contrats.',
                'content' => '{"header_section":[{"type":"banner","data":{"subtitle":"Service","title":"Gestion\nadministrative","description":"<p>Coordination et supervision des t\u00e2ches administratives pour votre propri\u00e9t\u00e9, incluant gestion des locataires et contrats.<\/p>","image":"01J0M7E5K65C409V7JR2A2MSA4.webp"}}],"footer_section":[{"type":"banner","data":{"subtitle":"Contact","title":"Avez-vous\nun projet ?\n","description":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, cupiditate?<\/p>","image":"01J0M7E5K89TG826X4724ZFVF9.webp","primary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}},"secondary_action":{"type":null,"data":null}}}],"content_section":null}',
            ],
            [
                'title' => 'Gestion opérationnelle',
                'slug' => 'gestion-operationnelle',
                'description' => 'Organisation quotidienne de la propriété, de la maintenance à la gestion locative, pour un fonctionnement optimal.',
                'content' => '{"header_section":[{"type":"banner","data":{"subtitle":"Service","title":"Gestion\nop\u00e9rationnelle","description":"<p>Organisation quotidienne de la propri\u00e9t\u00e9, de la maintenance \u00e0 la gestion locative, pour un fonctionnement optimal.<\/p>","image":"01J0M7FKT7QZ5R0GB9ME76C704.webp"}}],"footer_section":[{"type":"banner","data":{"subtitle":"Contact","title":"Avez-vous\nun projet ?\n","description":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, cupiditate?<\/p>","image":"01J0M7FKT9TQ3DYJMAM6155Z7M.webp","primary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}},"secondary_action":{"type":null,"data":null}}}],"content_section":null}',
            ]];

        foreach ($posts as $post) {
            ServicePost::factory()->create([
                'title' => $post['title'],
                'slug' => $post['slug'],
                'description' => $post['description'],
                'content' => json_decode($post['content'] ?? '[]', true),
                'status' => PublishedStatus::PUBLISHED,
            ]);
        }
    }

    public function seedBlog(): void
    {
        $categories = BlogCategory::factory()->count(10)->create();
        BlogPost::factory()->count(50)
            ->hasAttached($categories->random(rand(1, 3))->first())
            ->create();
    }

    private function seedPage(): void
    {
        $pages = [
            [
                'title' => 'Accueil',
                'slug' => 'accueil',
                'description' => 'Bienvenue sur notre site web.',
                'template' => 'App\Filament\Templates\Page\Home',
                'content' => '{"content_section":[{"type":"slider","data":{"slides":[{"subtitle":"Service","title":"Gestion\nadministrative","description":"<p>Coordination et supervision des t\u00e2ches administratives pour votre propri\u00e9t\u00e9, incluant gestion des locataires et contrats.<\/p>","image":"01J0M89RHXEP19RBX01C5BDWBD.webp","primary_action":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"En savoir plus","url":"2","target":null}},"secondary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}}},{"subtitle":"Service","title":"Gestion\nfinanci\u00e8re","description":"<p>Supervision des finances de vos propri\u00e9t\u00e9s, incluant facturation, loyers, et optimisation des rendements immobiliers.<\/p>","image":"01J0M89RJ9G7CBXZQHKCWCMAGJ.webp","primary_action":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"En savoir plus","url":"1","target":null}},"secondary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}}},{"subtitle":"Service","title":"Gestion\nop\u00e9rationnelle","description":"<p>Organisation quotidienne de la propri\u00e9t\u00e9, de la maintenance \u00e0 la gestion locative, pour un fonctionnement optimal.<\/p>","image":"01J0M89RJM16F6045FDQFTHS8Q.webp","primary_action":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"En savoir plus","url":"3","target":null}},"secondary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}}}],"pagination":true,"navigation":true}}]}',
            ],
            [
                'title' => 'Services',
                'slug' => 'services',
                'description' => 'Contactez-nous pour plus d\'informations.',
                'template' => 'App\Filament\Templates\Page\Service',
                'content' => '{"header_section":[{"type":"banner","data":{"subtitle":"Services","title":"Lorem ipsum \ndolor sit amet,","description":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus urna, feugiat pretium nibh eu, luctus interdum risus. Cras augue lorem, varius sed leo a, scelerisque rhoncus eros. Aliquam placerat id arcu sed elementum. Donec velit libero, mollis scelerisque eros eget, congue semper feli<\/p>","image":"01J0M8E03CA1KSX372Q3Z05EXE.webp"}}],"footer_section":[{"type":"banner","data":{"subtitle":"Contact","title":"Avez-vous\nun projet ?","description":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, cupiditate?<\/p>","image":"01J0M8E03D3QKDPBVHGB0WBS80.webp","primary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}},"secondary_action":{"type":null,"data":null}}}],"content_section":null}',
            ],
            [
                'title' => 'Blogue',
                'slug' => 'blogue',
                'description' => 'Contactez-nous pour plus d\'informations.',
                'template' => 'App\Filament\Templates\Page\Blog',
                'content' => '{"header_section":[{"type":"banner","data":{"subtitle":"Blogue","title":"Lorem ipsum dolor\nsit amet","description":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus urna, feugiat pretium nibh eu, luctus interdum risus. Cras augue lorem, varius se<\/p>","image":"01J0M8G84RX07RDDTHH43N9G3Z.webp"}}],"footer_section":[{"type":"banner","data":{"subtitle":"Contact","title":"Avez-vous\nun projet ?","description":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, cupiditate?<\/p>","image":"01J0M8G84S67FN6G1YNBYQ0PJB.webp","primary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}},"secondary_action":{"type":null,"data":null}}}],"content_section":null}',
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'description' => 'Contactez-nous pour plus d\'informations.',
                'template' => 'App\Filament\Templates\Page\Single',
                'content' => '{"header_section":[{"type":"banner","data":{"subtitle":"Contact","title":"Lorem ipsum\ndolor sit amet\n","description":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus urna, feugiat pretium nibh eu, luctus interdum risus. Cras augue lorem, varius se<\/p>","image":"01J0M8K9PRTTNAF7F0KP6NGJ6F.webp"}}],"footer_section":[],"content_section":null}',
            ],
            [
                'title' => 'À propos',
                'slug' => 'a-propos',
                'description' => 'Découvrez notre entreprise.',
                'template' => 'App\Filament\Templates\Page\Single',
                'content' => '{"header_section":[{"type":"banner","data":{"subtitle":"\u00c0 propos","title":"Lorem ipsum \ndolor sit amet, ","description":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean metus urna, feugiat pretium nibh eu, luctus interdum risus. Cras augue lorem, varius se<\/p>","image":"01J0M8J6P15EXMXNJ8XS0J4JJX.webp"}}],"footer_section":[{"type":"banner","data":{"subtitle":"Contact","title":"Avez-vous\nun projet ?\n","description":"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, cupiditate?<\/p>","image":"01J0M8J6P2CEY1KMXEWBGQCXH6.webp","primary_action":{"type":"App\\\\Models\\\\Page","data":{"label":"Contactez-nous","url":"4","target":null}},"secondary_action":{"type":null,"data":null}}}],"content_section":null}',
            ],
        ];

        foreach ($pages as $page) {
            Page::factory()->create([
                'title' => $page['title'],
                'slug' => $page['slug'],
                'description' => $page['description'],
                'template' => $page['template'],
                'content' => json_decode($page['content'] ?? '[]', true),
                'status' => PublishedStatus::PUBLISHED,
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
            Navigation::factory()->create([
                'title' => $menu['title'],
                'handle' => $menu['handle'],
                'items' => json_decode('{"5b210326-2262-4b4b-b3a3-8e6ea60bebe7":{"type":"App\\\\Models\\\\Page","data":{"label":"Services","url":"2","target":null},"children":{"d59e555f-3fb5-4b66-a613-a2277692916a":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion op\u00e9rationnelle","url":"3","target":null},"children":[]},"42c55340-a8a2-406a-93cc-2747c8b81bf7":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion administrative","url":"2","target":null},"children":[]},"d804be45-fbdd-44f9-b29c-651d3f3ab47a":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion financi\u00e8re","url":"1","target":null},"children":[]}}},"e4747ea5-03ee-43f3-bade-1d2c2ef06067":{"type":"App\\\\Models\\\\Page","data":{"label":"Blogue","url":"3","target":null},"children":[]},"134a0c23-e266-4cfe-a5e7-57361aab25cc":{"type":"App\\\\Models\\\\Page","data":{"label":"\u00c0 propos","url":"5","target":null},"children":[]},"58027fba-1488-451d-b716-66bd57ee9386":{"type":"App\\\\Models\\\\Page","data":{"label":"Contact","url":"4","target":null},"children":[]}}
', true),
            ]);
        }
    }
}
