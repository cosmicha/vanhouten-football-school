@extends('layouts.admin', ['title' => ($item->exists ? 'Edit ' : 'Add ') . $config['title']])

@section('content')
    <form method="POST"
          action="{{ $item->exists ? route($routePrefix.'.update', $item->id) : route($routePrefix.'.store') }}"
          enctype="multipart/form-data"
          class="max-w-5xl space-y-6">
        @csrf

        @if($item->exists)
            @method('PUT')
        @endif

        <div class="bg-white rounded-3xl shadow-sm border p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-black">{{ $item->exists ? 'Edit Content' : 'Create New Content' }}</h2>
                <p class="text-slate-500 mt-1">Fill the fields below. Uploaded media will be stored in the CMS library.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                @foreach($config['fields'] as $field => $type)
                    <div class="{{ in_array($type, ['textarea', 'image', 'file']) ? 'md:col-span-2' : '' }}">
                        <label class="block text-sm font-black text-slate-700 mb-2">
                            {{ ucwords(str_replace('_', ' ', $field)) }}
                        </label>

                        @php
                            $recommendations = [
                                'image' => 'Recommended: Program 1200x900 px, Gallery 1200x1200 px, Article 1600x900 px. JPG/PNG, max 5 MB.',
                                'photo' => 'Recommended: Coach photo 1200x1500 px, vertical portrait 4:5. JPG/PNG, max 5 MB.',
                                'thumbnail' => 'Recommended: Video thumbnail 1280x720 px, 16:9. JPG/PNG, max 5 MB.',
                                'video_file' => 'Recommended: MP4 H.264, 1920x1080 px, max 50 MB. For larger video, use YouTube embed.',
                            ];
                        @endphp

                        @if(isset($recommendations[$field]))
                            <div class="mb-3 text-sm text-slate-500 bg-slate-50 border rounded-2xl p-3">
                                {{ $recommendations[$field] }}
                            </div>
                        @endif

                        @if($type === 'textarea')
                            <textarea name="{{ $field }}" rows="5" class="w-full rounded-2xl border-slate-300 p-4">{{ old($field, $item->{$field}) }}</textarea>

                        @elseif($type === 'image')
                            <div class="border-2 border-dashed rounded-3xl p-5 bg-slate-50">
                                <input type="file" name="{{ $field }}_upload" accept="image/*" class="w-full">
                                @if($item->{$field})
                                    <img src="{{ asset('storage/'.$item->{$field}) }}" class="mt-4 h-56 rounded-2xl object-cover">
                                @endif
                            </div>

                        @elseif($type === 'file')
                            <div class="border-2 border-dashed rounded-3xl p-5 bg-slate-50">
                                <input type="file" name="{{ $field }}_upload" accept="video/*" class="w-full">
                                @if($item->{$field})
                                    <video src="{{ asset('storage/'.$item->{$field}) }}" controls class="mt-4 w-full max-w-xl rounded-2xl"></video>
                                @endif
                            </div>

                        @elseif($type === 'venue')
                            <select name="{{ $field }}" class="w-full rounded-2xl border-slate-300 p-4">
                                <option value="">Select Venue</option>
                                @foreach($venues as $venue)
                                    <option value="{{ $venue->id }}" @selected(old($field, $item->{$field}) == $venue->id)>
                                        {{ $venue->name }}
                                    </option>
                                @endforeach
                            </select>

                        @else
                            <input type="{{ $type }}"
                                   name="{{ $field }}"
                                   value="{{ old($field, $item->{$field}) }}"
                                   class="w-full rounded-2xl border-slate-300 p-4">
                        @endif
                    </div>
                @endforeach
            </div>

            <label class="mt-6 flex items-center gap-3 p-4 rounded-2xl bg-slate-50">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $item->is_active ?? true))>
                <span class="font-black">Active / Show on Website</span>
            </label>
        </div>

        <div class="flex gap-3 sticky bottom-4">
            <button class="px-7 py-4 bg-slate-950 text-white rounded-2xl font-black shadow-xl">
                Save Content
            </button>

            <a href="{{ route($routePrefix.'.index') }}" class="px-7 py-4 bg-white border rounded-2xl font-black">
                Cancel
            </a>
        </div>
    </form>
@endsection
