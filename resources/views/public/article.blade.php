<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }} - {{ $setting->site_name }}</title>
    <meta name="description" content="{{ $article->excerpt }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-950">
    <header class="bg-gray-950 text-white">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <a href="/" class="font-black text-xl">{{ $setting->site_name }}</a>
            <a href="/" class="font-bold">Back Home</a>
        </div>
    </header>

    <main class="py-16">
        <article class="max-w-4xl mx-auto px-6">
            @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}" class="w-full h-96 object-cover rounded-3xl mb-10">
            @endif

            <div class="text-sm font-black uppercase tracking-widest" style="color: {{ $setting->primary_color }}">
                {{ $article->category }}
            </div>

            <h1 class="mt-4 text-4xl md:text-6xl font-black tracking-tight">
                {{ $article->title }}
            </h1>

            <div class="mt-6 text-gray-500">
                {{ $article->created_at->format('d M Y') }}
            </div>

            <div class="mt-10 prose max-w-none text-lg leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </div>
        </article>
    </main>
</body>
</html>
