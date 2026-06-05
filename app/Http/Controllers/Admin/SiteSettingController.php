<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Support\MediaUploader;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $setting = SiteSetting::current();

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::current();

        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'primary_color' => 'required|string|max:20',
            'secondary_color' => 'required|string|max:20',
            'domain_name' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:100',
            'email' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'about_title' => 'nullable|string',
            'about_description' => 'nullable|string',
            'logo' => 'nullable|image|max:4096',
            'hero_image' => 'nullable|image|max:8192',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = MediaUploader::image($request->file('logo'), 'site', 500, 500);
        }

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = MediaUploader::image($request->file('hero_image'), 'site', 1920, 1080);
        }

        $setting->update($data);

        return back()->with('success', 'Website settings updated.');
    }
}
