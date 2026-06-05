@extends('layouts.admin', ['title' => $config['title']])

@section('content')
    @if(session('success'))
        <div class="mb-5 p-4 bg-emerald-100 text-emerald-800 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border overflow-hidden">
        <div class="p-6 flex flex-col md:flex-row justify-between gap-4 items-start md:items-center border-b">
            <div>
                <h2 class="text-2xl font-black">{{ $config['title'] }}</h2>
                <p class="text-slate-500 mt-1">Manage content displayed on the public website.</p>
            </div>

            <a href="{{ route($routePrefix.'.create') }}" class="px-5 py-3 bg-slate-950 text-white rounded-2xl font-black">
                + Add New
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 text-slate-500 text-sm uppercase">
                    <tr>
                        <th class="p-4 text-left">Item</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Updated</th>
                        <th class="p-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr class="border-t hover:bg-slate-50">
                            <td class="p-4">
                                <div class="font-black text-lg">
                                    {{ $item->title ?? $item->name ?? $item->day_name ?? 'Item' }}
                                </div>
                                <div class="text-sm text-slate-500">
                                    {{ $item->category ?? $item->role ?? $item->age_group ?? $item->city ?? $item->time_range ?? '' }}
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-sm font-bold {{ $item->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-500">
                                {{ $item->updated_at?->format('d M Y H:i') }}
                            </td>
                            <td class="p-4 text-right">
                                <a href="{{ route($routePrefix.'.edit', $item->id) }}" class="px-4 py-2 bg-slate-100 rounded-xl font-bold">Edit</a>

                                <form action="{{ route($routePrefix.'.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 bg-red-50 text-red-600 rounded-xl font-bold ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-10 text-center text-slate-500">
                                No data yet. Click Add New to create your first content.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
