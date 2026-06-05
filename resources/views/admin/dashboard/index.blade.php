@extends('layouts.admin', ['title' => 'CMS Dashboard'])

@section('content')
    <div class="grid md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Total Leads</div>
            <div class="mt-2 text-4xl font-black">{{ $stats['leads'] }}</div>
        </div>

        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">New Leads</div>
            <div class="mt-2 text-4xl font-black text-emerald-600">{{ $stats['new_leads'] }}</div>
        </div>

        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Programs</div>
            <div class="mt-2 text-4xl font-black">{{ $stats['programs'] }}</div>
        </div>

        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Coaches</div>
            <div class="mt-2 text-4xl font-black">{{ $stats['coaches'] }}</div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border overflow-hidden">
            <div class="p-6 border-b">
                <h2 class="text-2xl font-black">Latest Trial Requests</h2>
                <p class="text-slate-500 mt-1">Newest inquiries from website form.</p>
            </div>

            <div class="divide-y">
                @forelse($latestMessages as $message)
                    <a href="{{ route('admin.contact-messages.show', $message) }}" class="block p-5 hover:bg-slate-50">
                        <div class="flex justify-between gap-4">
                            <div>
                                <div class="font-black">{{ $message->parent_name }}</div>
                                <div class="text-sm text-slate-500">
                                    {{ $message->child_name ?: 'Child name not provided' }} · {{ $message->phone }}
                                </div>
                            </div>

                            <span class="h-fit px-3 py-1 rounded-full text-sm font-bold bg-slate-100">
                                {{ str_replace('_', ' ', ucfirst($message->status)) }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="p-8 text-slate-500">No leads yet.</div>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border p-6">
            <h2 class="text-2xl font-black">Lead Pipeline</h2>

            <div class="mt-6 space-y-4">
                @foreach($leadStatus as $status => $count)
                    <div>
                        <div class="flex justify-between font-bold">
                            <span>{{ str_replace('_', ' ', ucfirst($status)) }}</span>
                            <span>{{ $count }}</span>
                        </div>
                        <div class="mt-2 h-3 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-slate-950 rounded-full" style="width: {{ $stats['leads'] > 0 ? ($count / $stats['leads']) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('admin.contact-messages.index') }}" class="block mt-8 px-5 py-3 bg-slate-950 text-white rounded-2xl text-center font-black">
                Manage Leads
            </a>
        </div>
    </div>

    <div class="mt-6 grid md:grid-cols-4 gap-4">
        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Schedules</div>
            <div class="mt-2 text-3xl font-black">{{ $stats['schedules'] }}</div>
        </div>

        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Gallery</div>
            <div class="mt-2 text-3xl font-black">{{ $stats['gallery'] }}</div>
        </div>

        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Videos</div>
            <div class="mt-2 text-3xl font-black">{{ $stats['videos'] }}</div>
        </div>

        <div class="bg-white rounded-3xl p-5 shadow-sm border">
            <div class="text-sm text-slate-500">Articles</div>
            <div class="mt-2 text-3xl font-black">{{ $stats['articles'] }}</div>
        </div>
    </div>
@endsection
