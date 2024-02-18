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
        Artisan::call('shield:generate --all');
        $this->seedRoles();
        $this->seedAdminUser();
        $this->seedEditorUser();
    }

    private function seedRoles()
    {
        Role::create(['name' => 'Editor']);
    }

    private function seedAdminUser()
    {
        User::unsetEventDispatcher();

        $admin = User::firstOrCreate(
            ['email' => 'admin@vilaplex.ca'],
            [
                'name' => 'Admin Vilaplex',
                'password' => 'password',
            ]
        );
        $admin->assignRole(config('app.admin_role'));
    }

    private function seedEditorUser()
    {
        User::unsetEventDispatcher();

        $admin = User::firstOrCreate(
            ['email' => 'editor@vilaplex.ca'],
            [
                'name' => 'Editor Vilaplex',
                'password' => 'password',
            ]
        );
        $admin->assignRole('Editor');
    }
}
