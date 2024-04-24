<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProdDataSeeder extends Seeder
{
    public function run()
    {
        $this->seedAdminUser();
        $this->seedServices();
    }

    private function seedAdminUser()
    {
        User::firstOrCreate(
            ['email' => 'admin@vilaplex.ca'],
            [
                'name' => 'Admin Vilaplex',
                'password' => 'password',
            ]
        );
    }

    private function seedServices()
    {
        return Service::factory()->count(3)->sequence(
            [
                'title' => [
                    'fr' => 'Gestion financière',
                    'en' => 'Financial management',
                ],
                'slug' => [
                    'fr' => 'gestion-financiere',
                    'en' => 'financial-management',
                ],
                'excerpt' => [
                    'fr' => 'Supervision des finances de vos propriétés, incluant facturation, loyers, et optimisation des rendements immobiliers.',
                    'en' => 'Supervision of the finances of your properties, including invoicing, rents, and optimization of real estate returns.',
                ],
                'content' => [
                    'fr' => '',
                    'en' => '',
                ],
                'status' => 'published',
            ],
            [
                'title' => [
                    'fr' => 'Gestion administrative',
                    'en' => 'Administrative management',
                ],
                'slug' => [
                    'fr' => 'gestion-administrative',
                    'en' => 'administrative-management',
                ],
                'excerpt' => [
                    'fr' => 'Coordination et supervision des tâches administratives pour votre propriété, incluant gestion des locataires et contrats.',
                    'en' => 'Coordination and supervision of administrative tasks for your property, including tenant management and contracts.',
                ],
                'content' => [
                    'fr' => '',
                    'en' => '',
                ],
                'status' => 'published',
            ],
            [
                'title' => [
                    'fr' => 'Gestion opérationnelle',
                    'en' => 'Operational management',
                ],
                'slug' => [
                    'fr' => 'gestion-operationnelle',
                    'en' => 'operational-management',
                ],
                'excerpt' => [
                    'fr' => 'Organisation quotidienne de la propriété, de la maintenance à la gestion locative, pour un fonctionnement optimal.',
                    'en' => 'Daily organization of the property, from maintenance to rental management, for optimal operation.',
                ],
                'content' => [
                    'fr' => '',
                    'en' => '',
                ],
                'status' => 'published',
            ],
        )->create();
    }
}
