<?php

namespace Database\Seeders;

use App\Enums\ConfigDataType;
use App\Models\DynamicConfig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DynamicConfigSeeder extends Seeder
{
    public function run()
    {
        if (DynamicConfig::where(DynamicConfig::KEY, 'logo_dark')->count() == 0) {
            $configApp = new DynamicConfig();
            $configApp[DynamicConfig::TITLE] = 'Logo dark';
            $configApp[DynamicConfig::KEY] = 'logo_dark';
            $configApp[DynamicConfig::CONTENT] = [
                'fr' => Storage::disk('public')->putFile('/configs', public_path('svg/logo-minimal-dark.svg')),
                'en' => Storage::disk('public')->putFile('/configs', public_path('svg/logo-minimal-dark.svg')),
            ];
            $configApp[DynamicConfig::TYPE] = ConfigDataType::IMAGE;
            $configApp->save();
        }
        if (DynamicConfig::where(DynamicConfig::KEY, 'country')->count() == 0) {
            $configApp = new DynamicConfig();
            $configApp[DynamicConfig::TITLE] = 'Country';
            $configApp[DynamicConfig::KEY] = 'country';
            $configApp[DynamicConfig::CONTENT] = 'Canada';
            $configApp[DynamicConfig::TYPE] = ConfigDataType::STRING;
            $configApp->save();
        }
        if (DynamicConfig::where(DynamicConfig::KEY, 'city')->count() == 0) {
            $configApp = new DynamicConfig();
            $configApp[DynamicConfig::TITLE] = 'City';
            $configApp[DynamicConfig::KEY] = 'city';
            $configApp[DynamicConfig::CONTENT] = 'Toronto';
            $configApp[DynamicConfig::TYPE] = ConfigDataType::STRING;
            $configApp->save();
        }
        if (DynamicConfig::where(DynamicConfig::KEY, 'address_line_1')->count() == 0) {
            $configApp = new DynamicConfig();
            $configApp[DynamicConfig::TITLE] = 'Addresse line 1';
            $configApp[DynamicConfig::KEY] = 'address_line_1';
            $configApp[DynamicConfig::CONTENT] = 'HTGS 4456 North Av.';
            $configApp[DynamicConfig::TYPE] = ConfigDataType::STRING;
            $configApp->save();
        }
        if (DynamicConfig::where(DynamicConfig::KEY, 'email')->count() == 0) {
            $configApp = new DynamicConfig();
            $configApp[DynamicConfig::TITLE] = 'Email';
            $configApp[DynamicConfig::KEY] = 'email';
            $configApp[DynamicConfig::CONTENT] = 'mireya.inbox@mail.com';
            $configApp[DynamicConfig::TYPE] = ConfigDataType::STRING;
            $configApp->save();
        }
        if (DynamicConfig::where(DynamicConfig::KEY, 'phone')->count() == 0) {
            $configApp = new DynamicConfig();
            $configApp[DynamicConfig::TITLE] = 'Phone';
            $configApp[DynamicConfig::KEY] = 'phone';
            $configApp[DynamicConfig::CONTENT] = '+4 9(054) 996 84 25';
            $configApp[DynamicConfig::TYPE] = ConfigDataType::STRING;
            $configApp->save();
        }

    }
}
