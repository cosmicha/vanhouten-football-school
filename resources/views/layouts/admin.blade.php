<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'CMS Admin' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    <div class="min-h-screen flex">
        <aside class="w-72 bg-slate-950 text-white hidden lg:flex flex-col">
            <div class="p-6 border-b border-white/10">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-400">CMS</div>
                <div class="mt-2 text-2xl font-black">Football Admin</div>
            </div>

            <nav class="p-4 space-y-2 flex-1">
                @php
                    $menus = [
                        ['Settings', 'admin.settings.edit'],
                        ['Programs', 'admin.programs.index'],
                        ['Coaches', 'admin.coaches.index'],
                        ['Venues', 'admin.venues.index'],
                        ['Schedule', 'admin.schedules.index'],
                        ['Gallery', 'admin.gallery.index'],
                        ['Videos', 'admin.videos.index'],
                        ['News', 'admin.articles.index'],
                        ['Messages', 'admin.contact-messages.index'],
                    ];
                @endphp

                @foreach($menus as [$label, $route])
                    <a href="{{ route($route) }}"
                       class="block px-4 py-3 rounded-xl font-semibold transition
                       {{ request()->routeIs($route) ? 'bg-white text-slate-950' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            <div class="p-4 border-t border-white/10">
                <a href="/" target="_blank" class="block px-4 py-3 rounded-xl bg-emerald-500 text-white font-black text-center">
                    View Website
                </a>
            </div>
        </aside>

        <main class="flex-1">
            <header class="bg-white border-b sticky top-0 z-40">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <div class="text-sm text-slate-500">Website Management</div>
                        <h1 class="text-2xl font-black">{{ $title ?? 'CMS Dashboard' }}</h1>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="/" target="_blank" class="px-4 py-2 rounded-xl bg-slate-100 font-bold">Preview</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="px-4 py-2 rounded-xl bg-slate-950 text-white font-bold">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
