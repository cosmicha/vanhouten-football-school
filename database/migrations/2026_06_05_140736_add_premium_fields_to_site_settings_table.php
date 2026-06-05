<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('about_title')->nullable();
            $table->text('about_description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'whatsapp_number',
                'email',
                'instagram_url',
                'seo_title',
                'seo_description',
                'about_title',
                'about_description',
            ]);
        });
    }
};
