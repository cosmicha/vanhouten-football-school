<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'hero_title',
        'hero_subtitle',
        'primary_color',
        'secondary_color',
        'logo',
        'hero_image',
        'domain_name',
        'whatsapp_number',
        'email',
        'instagram_url',
        'seo_title',
        'seo_description',
        'about_title',
        'about_description',
    ];

    public static function current(): self
    {
        return self::firstOrCreate([], [
            'site_name' => 'Elite Football Academy',
            'tagline' => 'Train. Grow. Compete.',
            'hero_title' => 'Build Confidence, Discipline, and Football Skills',
            'hero_subtitle' => 'A premium football school for young players who want structured training, character development, and real match experience.',
            'primary_color' => '#0B5D1E',
            'secondary_color' => '#F5C542',
            'about_title' => 'More than football training. We build character, discipline, and confidence.',
            'about_description' => 'Our academy combines technical football development, physical conditioning, teamwork, and mental strength to help young players grow on and off the pitch.',
        ]);
    }
}
