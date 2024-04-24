<?php

use Database\Seeders\DynamicConfigSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    public function up()
    {
        Schema::create('dynamic_configs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('key');
            $table->json('content');
            $table->timestamps();
        });
        (new DynamicConfigSeeder)->run();
    }
};
