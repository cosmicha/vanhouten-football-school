<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Elite Football Academy');
            $table->string('tagline')->nullable();
            $table->text('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('primary_color')->default('#0B5D1E');
            $table->string('secondary_color')->default('#F5C542');
            $table->string('logo')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('domain_name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
