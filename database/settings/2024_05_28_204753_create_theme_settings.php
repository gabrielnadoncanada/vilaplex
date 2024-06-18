<?php

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('theme.site_title', 'Vilaplex');
        $this->migrator->add('theme.site_home_page_id', 1);
        $this->migrator->add('theme.site_service_page_id', 2);
        $this->migrator->add('theme.site_blog_page_id', 3);
        $this->migrator->add('theme.site_tag_line', 'Lorem Ipsum Dolor Sit');
        $this->migrator->add('theme.site_fav_icon', Storage::disk('public')->putFile(public_path(config('seeding.favicon_placeholder_path'))));
        $this->migrator->add('theme.site_logo', Storage::disk('public')->putFile(public_path(config('seeding.logo_placeholder_path'))));
        $this->migrator->add('theme.header_menu_id', 1);
        $this->migrator->add('theme.footer_menu_id', 1);
        $this->migrator->add('theme.site_country', '');
        $this->migrator->add('theme.site_state', '');
        $this->migrator->add('theme.site_city', '');
        $this->migrator->add('theme.site_address', '');
        $this->migrator->add('theme.site_email', '');
        $this->migrator->add('theme.site_phone', '');
    }
};
