<?php

namespace Database\Seeders;

use App\Models\User;
use Artisan;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ProdDataSeeder extends Seeder
{
    public function run()
    {
        $this->seedAdminUser();
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
}
