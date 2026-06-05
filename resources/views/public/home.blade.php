<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $setting->seo_title ?: $setting->site_name }}</title>
    <meta name="description" content="{{ $setting->seo_description ?: $setting->hero_subtitle }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-white text-gray-950">
    @php
        $wa = $setting->whatsapp_number ? 'https://wa.me/'.$setting->whatsapp_number : '#';
    @endphp

    <header class="fixed top-0 left-0 right-0 z-50 bg-black/30 backdrop-blur-xl border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between text-white">
            <a href="/" class="flex items-center gap-3">
                @if($setting->logo)
                    <img src="{{ asset('storage/'.$setting->logo) }}" class="h-12">
                @else
                    <div class="h-12 w-12 rounded-xl flex items-center justify-center font-black" style="background: {{ $setting->secondary_color }}; color:#111;">FS</div>
                @endif
                <div>
                    <div class="font-black text-xl tracking-tight">{{ $setting->site_name }}</div>
                    <div class="text-xs opacity-75 uppercase tracking-widest">{{ $setting->tagline }}</div>
                </div>
            </a>

            <nav class="hidden lg:flex gap-7 font-semibold text-sm">
                <a href="#programs">Programs</a>
                <a href="#coaches">Coaches</a>
                <a href="#schedule">Schedule</a>
                <a href="#gallery">Gallery</a>
                <a href="#videos">Videos</a>
                <a href="#news">News</a>
            </nav>

            <a href="{{ $wa }}" target="_blank" class="hidden md:inline-flex px-5 py-3 rounded-xl font-bold text-gray-950" style="background: {{ $setting->secondary_color }}">
                Trial Class
            </a>

            <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="lg:hidden px-4 py-2 rounded-xl bg-white/10 font-bold">
                Menu
            </button>
        </div>

        <div id="mobileMenu" class="hidden lg:hidden bg-black/90 text-white px-6 pb-6">
            <div class="flex flex-col gap-4 font-semibold">
                <a href="#programs">Programs</a>
                <a href="#coaches">Coaches</a>
                <a href="#schedule">Schedule</a>
                <a href="#gallery">Gallery</a>
                <a href="#videos">Videos</a>
                <a href="#news">News</a>
                <a href="#contact">Contact</a>
            </div>
        </div>
    </header>

    <section class="relative min-h-screen flex items-center overflow-hidden">
        @if($setting->hero_image)
            <img src="{{ asset('storage/'.$setting->hero_image) }}" class="absolute inset-0 w-full h-full object-cover scale-105">
        @else
            <div class="absolute inset-0 bg-gray-950"></div>
        @endif

        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/75 to-black/20"></div>
        <div class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-white to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-white pt-28">
            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-black mb-6"
                     style="background: {{ $setting->secondary_color }}; color:#111;">
                    ⚽ Premium Youth Football Academy
                </div>

                <h1 class="text-5xl md:text-8xl font-black leading-[0.95] tracking-tight">
                    {{ $setting->hero_title }}
                </h1>

                <p class="mt-8 text-lg md:text-2xl text-gray-200 max-w-3xl leading-relaxed">
                    {{ $setting->hero_subtitle }}
                </p>

                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="{{ $wa }}" target="_blank" class="px-8 py-5 rounded-2xl font-black text-white text-center"
                       style="background: {{ $setting->primary_color }}">
                        Register Trial Class
                    </a>

                    <a href="#programs" class="px-8 py-5 rounded-2xl font-black bg-white text-gray-950 text-center">
                        Explore Programs
                    </a>
                </div>

                <div class="mt-12 grid grid-cols-3 gap-4 max-w-2xl">
                    <div class="p-5 rounded-2xl bg-white/10 backdrop-blur border border-white/10">
                        <div class="text-3xl font-black">5+</div>
                        <div class="text-sm opacity-75">Age Groups</div>
                    </div>
                    <div class="p-5 rounded-2xl bg-white/10 backdrop-blur border border-white/10">
                        <div class="text-3xl font-black">Pro</div>
                        <div class="text-sm opacity-75">Coaching</div>
                    </div>
                    <div class="p-5 rounded-2xl bg-white/10 backdrop-blur border border-white/10">
                        <div class="text-3xl font-black">Match</div>
                        <div class="text-sm opacity-75">Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14 items-center">
            <div>
                <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->primary_color }}">About The Academy</div>
                <h2 class="mt-4 text-4xl md:text-6xl font-black tracking-tight">
                    {{ $setting->about_title }}
                </h2>
            </div>
            <div>
                <p class="text-xl text-gray-600 leading-relaxed">
                    {{ $setting->about_description }}
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-4">
                    <div class="p-6 rounded-2xl bg-gray-50 border">
                        <div class="font-black text-xl">Technical Skills</div>
                        <p class="mt-2 text-gray-600">Ball mastery, passing, shooting, positioning.</p>
                    </div>
                    <div class="p-6 rounded-2xl bg-gray-50 border">
                        <div class="font-black text-xl">Character</div>
                        <p class="mt-2 text-gray-600">Discipline, teamwork, confidence, responsibility.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="programs" class="py-24 bg-gray-950 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end gap-6">
                <div>
                    <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->secondary_color }}">Training Pathway</div>
                    <h2 class="mt-4 text-4xl md:text-6xl font-black">Programs / Classes</h2>
                </div>
            </div>

            <div class="mt-12 grid md:grid-cols-3 gap-6">
                @forelse($programs as $program)
                    <div class="group rounded-3xl overflow-hidden bg-white/5 border border-white/10">
                        <div class="relative h-64 overflow-hidden">
                            @if($program->image)
                                <img src="{{ asset('storage/'.$program->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full bg-gray-800"></div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                            <div class="absolute bottom-5 left-5 right-5">
                                <div class="inline-block px-3 py-1 rounded-full text-xs font-black" style="background: {{ $setting->secondary_color }}; color:#111;">
                                    {{ $program->age_group ?: 'Youth Program' }}
                                </div>
                                <h3 class="mt-3 text-2xl font-black">{{ $program->title }}</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-300">{{ $program->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">No programs yet. Add from CMS.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="coaches" class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->primary_color }}">Mentors</div>
            <h2 class="mt-4 text-4xl md:text-6xl font-black">Our Coaches</h2>

            <div class="mt-12 grid md:grid-cols-4 gap-6">
                @forelse($coaches as $coach)
                    <div class="rounded-3xl border overflow-hidden bg-white shadow-sm">
                        @if($coach->photo)
                            <img src="{{ asset('storage/'.$coach->photo) }}" class="w-full h-72 object-cover">
                        @else
                            <div class="w-full h-72 bg-gray-100"></div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-2xl font-black">{{ $coach->name }}</h3>
                            <div class="mt-1 font-bold" style="color: {{ $setting->primary_color }}">{{ $coach->role }}</div>
                            <p class="mt-4 text-gray-600">{{ $coach->bio }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No coaches yet. Add from CMS.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="schedule" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->primary_color }}">Weekly Plan</div>
            <h2 class="mt-4 text-4xl md:text-6xl font-black">Training Schedule</h2>

            <div class="mt-12 bg-white border rounded-3xl overflow-hidden shadow-sm">
                <table class="w-full">
                    <thead class="text-white" style="background: {{ $setting->primary_color }}">
                        <tr>
                            <th class="p-5 text-left">Day</th>
                            <th class="p-5 text-left">Time</th>
                            <th class="p-5 text-left">Program</th>
                            <th class="p-5 text-left">Venue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedules as $schedule)
                            <tr class="border-t">
                                <td class="p-5 font-black">{{ $schedule->day_name }}</td>
                                <td class="p-5">{{ $schedule->time_range }}</td>
                                <td class="p-5">{{ $schedule->program_name }}</td>
                                <td class="p-5">{{ $schedule->venue?->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-8 text-gray-500">No schedule yet. Add from CMS.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-10 grid md:grid-cols-3 gap-6">
                @foreach($venues as $venue)
                    <div class="p-7 bg-white border rounded-3xl shadow-sm">
                        <h3 class="text-2xl font-black">{{ $venue->name }}</h3>
                        <div class="mt-1 text-gray-500">{{ $venue->city }}</div>
                        <p class="mt-4 text-gray-600">{{ $venue->address }}</p>
                        @if($venue->map_url)
                            <a href="{{ $venue->map_url }}" target="_blank" class="inline-block mt-5 font-black" style="color: {{ $setting->primary_color }}">
                                Open Map →
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="gallery" class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->primary_color }}">Moments</div>
            <h2 class="mt-4 text-4xl md:text-6xl font-black">Gallery</h2>

            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4">
                @forelse($gallery as $item)
                    <div class="group relative overflow-hidden rounded-3xl">
                        <img src="{{ asset('storage/'.$item->image) }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        @if($item->title)
                            <div class="absolute bottom-4 left-4 right-4 text-white font-black">{{ $item->title }}</div>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500">No gallery yet. Add from CMS.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="videos" class="py-24 bg-gray-950 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->secondary_color }}">Highlights</div>
            <h2 class="mt-4 text-4xl md:text-6xl font-black">Videos</h2>

            <div class="mt-12 grid md:grid-cols-2 gap-6">
                @forelse($videos as $video)
                    <div class="rounded-3xl overflow-hidden bg-white/5 border border-white/10">
                        @if($video->video_file)
                            <video src="{{ asset('storage/'.$video->video_file) }}" controls class="w-full"></video>
                        @elseif($video->video_url)
                            <div class="aspect-video">
                                <iframe src="{{ $video->video_url }}" class="w-full h-full" allowfullscreen></iframe>
                            </div>
                        @elseif($video->thumbnail)
                            <img src="{{ asset('storage/'.$video->thumbnail) }}" class="w-full h-72 object-cover">
                        @endif
                        <div class="p-6">
                            <h3 class="text-2xl font-black">{{ $video->title }}</h3>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">No videos yet. Add from CMS.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="news" class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->primary_color }}">Updates</div>
            <h2 class="mt-4 text-4xl md:text-6xl font-black">News / Articles</h2>

            <div class="mt-12 grid md:grid-cols-3 gap-6">
                @forelse($articles as $article)
                    <article class="rounded-3xl border overflow-hidden bg-white shadow-sm">
                        @if($article->image)
                            <img src="{{ asset('storage/'.$article->image) }}" class="w-full h-56 object-cover">
                        @endif
                        <div class="p-6">
                            <div class="text-sm font-black uppercase" style="color: {{ $setting->primary_color }}">
                                {{ $article->category }}
                            </div>
                            <h3 class="mt-3 text-2xl font-black">{{ $article->title }}</h3>
                            <p class="mt-4 text-gray-600">{{ $article->excerpt }}</p>
                            <a href="{{ route('article.show', $article) }}" class="inline-block mt-5 font-black" style="color: {{ $setting->primary_color }}">Read More →</a>
                        </div>
                    </article>
                @empty
                    <p class="text-gray-500">No articles yet. Add from CMS.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="contact" class="py-24 text-white" style="background: {{ $setting->primary_color }}">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-start">
            <div>
                <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->secondary_color }}">Join The Academy</div>
                <h2 class="mt-4 text-4xl md:text-6xl font-black">Start with a Trial Class</h2>
                <p class="mt-6 text-xl opacity-90">Send us a message and our team will help you choose the right program, age group, schedule, and venue.</p>

                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="{{ $wa }}" target="_blank" class="px-8 py-5 bg-white text-gray-950 rounded-2xl font-black text-center">
                        WhatsApp Registration
                    </a>

                    @if($setting->instagram_url)
                        <a href="{{ $setting->instagram_url }}" target="_blank" class="px-8 py-5 border border-white/30 rounded-2xl font-black text-center">
                            Instagram
                        </a>
                    @endif
                </div>

                @if($setting->email)
                    <div class="mt-8 opacity-90">{{ $setting->email }}</div>
                @endif
            </div>

            <div class="bg-white text-gray-950 rounded-3xl p-6 shadow-2xl">
                @if(session('contact_success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-xl">
                        {{ session('contact_success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="font-bold">Parent Name</label>
                        <input name="parent_name" required class="mt-1 w-full border rounded-xl p-3">
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="font-bold">Child Name</label>
                            <input name="child_name" class="mt-1 w-full border rounded-xl p-3">
                        </div>
                        <div>
                            <label class="font-bold">Child Age</label>
                            <input name="child_age" class="mt-1 w-full border rounded-xl p-3">
                        </div>
                    </div>

                    <div>
                        <label class="font-bold">Phone / WhatsApp</label>
                        <input name="phone" required class="mt-1 w-full border rounded-xl p-3">
                    </div>

                    <div>
                        <label class="font-bold">Email</label>
                        <input name="email" type="email" class="mt-1 w-full border rounded-xl p-3">
                    </div>

                    <div>
                        <label class="font-bold">Message</label>
                        <textarea name="message" rows="4" class="mt-1 w-full border rounded-xl p-3"></textarea>
                    </div>

                    <button class="w-full px-6 py-4 rounded-xl text-white font-black" style="background: {{ $setting->primary_color }}">
                        Submit Trial Request
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer class="py-8 bg-gray-950 text-white">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between gap-4">
            <div>
                <div class="font-black">{{ $setting->site_name }}</div>
                <div class="text-sm text-gray-400">{{ $setting->tagline }}</div>
            </div>
            <div class="text-sm text-gray-400">
                © {{ date('Y') }} {{ $setting->site_name }}. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
