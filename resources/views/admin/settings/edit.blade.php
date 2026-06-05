@extends('layouts.admin', ['title' => 'Website Settings'])

@section('content')
    <div class="grid md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">CMS Status</div>
            <div class="mt-2 text-2xl font-black text-emerald-600">Active</div>
        </div>
        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Domain</div>
            <div class="mt-2 text-xl font-black truncate">{{ $setting->domain_name ?: 'Not Set' }}</div>
        </div>
        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Primary Color</div>
            <div class="mt-3 h-8 rounded-xl" style="background: {{ $setting->primary_color }}"></div>
        </div>
        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Secondary Color</div>
            <div class="mt-3 h-8 rounded-xl" style="background: {{ $setting->secondary_color }}"></div>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-5 p-4 bg-emerald-100 text-emerald-800 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white rounded-3xl shadow-sm border p-6">
            <h2 class="text-xl font-black mb-5">Brand Identity</h2>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">Site Name</label>
                    <input name="site_name" value="{{ old('site_name', $setting->site_name) }}" class="w-full rounded-2xl border-slate-300 p-4">
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">Tagline</label>
                    <input name="tagline" value="{{ old('tagline', $setting->tagline) }}" class="w-full rounded-2xl border-slate-300 p-4">
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">Primary Color</label>
                    <input type="color" name="primary_color" value="{{ old('primary_color', $setting->primary_color) }}" class="w-full h-14 rounded-2xl border">
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">Secondary Color</label>
                    <input type="color" name="secondary_color" value="{{ old('secondary_color', $setting->secondary_color) }}" class="w-full h-14 rounded-2xl border">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border p-6">
            <h2 class="text-xl font-black mb-5">Homepage Hero</h2>

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">Hero Title</label>
                    <textarea name="hero_title" rows="3" class="w-full rounded-2xl border-slate-300 p-4">{{ old('hero_title', $setting->hero_title) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">Hero Subtitle</label>
                    <textarea name="hero_subtitle" rows="4" class="w-full rounded-2xl border-slate-300 p-4">{{ old('hero_subtitle', $setting->hero_subtitle) }}</textarea>
                </div>

                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-black text-slate-700 mb-2">Logo</label>
                        <div class="mb-3 text-sm text-slate-500 bg-slate-50 border rounded-2xl p-3">
                            Recommended: 500 x 500 px, transparent PNG or JPG. Auto-converted to optimized JPG.
                        </div>

                        @if($setting->logo)
                            <div class="mb-4 rounded-2xl border bg-slate-50 p-4">
                                <div class="text-sm font-bold text-slate-500 mb-2">Current Logo</div>
                                <img src="{{ asset('storage/'.$setting->logo) }}" class="h-24 rounded-xl bg-white p-2 border">

                                <label class="mt-4 flex items-center gap-2 text-red-600 font-bold">
                                    <input type="checkbox" name="remove_logo" value="1">
                                    Delete current logo
                                </label>
                            </div>
                        @endif

                        <input type="file" name="logo" class="w-full rounded-2xl border p-4">
                        <div class="mt-2 text-sm text-slate-500">Upload new file to replace the current logo.</div>
                    </div>

                    <div>
                        <label class="block text-sm font-black text-slate-700 mb-2">Hero Image</label>
                        <div class="mb-3 text-sm text-slate-500 bg-slate-50 border rounded-2xl p-3">
                            Recommended: 1920 x 1080 px, 16:9 landscape, max 8 MB. Auto-cropped and optimized.
                        </div>

                        @if($setting->hero_image)
                            <div class="mb-4 rounded-2xl border bg-slate-50 p-4">
                                <div class="text-sm font-bold text-slate-500 mb-2">Current Hero Image</div>
                                <img src="{{ asset('storage/'.$setting->hero_image) }}" class="h-48 w-full rounded-2xl object-cover border">

                                <label class="mt-4 flex items-center gap-2 text-red-600 font-bold">
                                    <input type="checkbox" name="remove_hero_image" value="1">
                                    Delete current hero image
                                </label>
                            </div>
                        @endif

                        <input type="file" name="hero_image" class="w-full rounded-2xl border p-4">
                        <div class="mt-2 text-sm text-slate-500">Upload new file to replace the current hero image.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border p-6">
            <h2 class="text-xl font-black mb-5">About, Contact & SEO</h2>

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">About Title</label>
                    <textarea name="about_title" rows="2" class="w-full rounded-2xl border-slate-300 p-4">{{ old('about_title', $setting->about_title) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">About Description</label>
                    <textarea name="about_description" rows="4" class="w-full rounded-2xl border-slate-300 p-4">{{ old('about_description', $setting->about_description) }}</textarea>
                </div>

                <div class="grid md:grid-cols-3 gap-5">
                    <input name="whatsapp_number" value="{{ old('whatsapp_number', $setting->whatsapp_number) }}" placeholder="WhatsApp Number" class="w-full rounded-2xl border-slate-300 p-4">
                    <input name="email" value="{{ old('email', $setting->email) }}" placeholder="Email" class="w-full rounded-2xl border-slate-300 p-4">
                    <input name="instagram_url" value="{{ old('instagram_url', $setting->instagram_url) }}" placeholder="Instagram URL" class="w-full rounded-2xl border-slate-300 p-4">
                </div>

                <input name="seo_title" value="{{ old('seo_title', $setting->seo_title) }}" placeholder="SEO Title" class="w-full rounded-2xl border-slate-300 p-4">

                <textarea name="seo_description" rows="3" placeholder="SEO Description" class="w-full rounded-2xl border-slate-300 p-4">{{ old('seo_description', $setting->seo_description) }}</textarea>

                <input name="domain_name" value="{{ old('domain_name', $setting->domain_name) }}" placeholder="Domain Name for Publish Later" class="w-full rounded-2xl border-slate-300 p-4">
            </div>
        </div>

        <div class="sticky bottom-4">
            <button class="w-full md:w-auto px-8 py-4 rounded-2xl bg-slate-950 text-white font-black shadow-xl">
                Save Website Settings
            </button>
        </div>
    </form>
@endsection
