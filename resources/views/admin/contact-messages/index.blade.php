@extends('layouts.admin', ['title' => 'Contact Messages'])

@section('content')
    @if(session('success'))
        <div class="mb-5 p-4 bg-emerald-100 text-emerald-800 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm border overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-2xl font-black">Trial Class Requests</h2>
            <p class="text-slate-500 mt-1">Messages submitted from the public website contact form.</p>
        </div>

        <table class="w-full">
            <thead class="bg-slate-50 text-slate-500 text-sm uppercase">
                <tr>
                    <th class="p-4 text-left">Parent</th>
                    <th class="p-4 text-left">Child</th>
                    <th class="p-4 text-left">Phone</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr class="border-t hover:bg-slate-50">
                        <td class="p-4 font-black">{{ $message->parent_name }}</td>
                        <td class="p-4">{{ $message->child_name }} {{ $message->child_age ? '('.$message->child_age.')' : '' }}</td>
                        <td class="p-4">{{ $message->phone }}</td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-sm font-bold {{ $message->is_read ? 'bg-slate-100 text-slate-500' : 'bg-emerald-100 text-emerald-700' }}">
                                {{ str_replace('_', ' ', ucfirst($message->status)) }}
                            </span>
                        </td>
                        <td class="p-4 text-right">
                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="px-4 py-2 bg-slate-100 rounded-xl font-bold">View</a>
                            <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}" class="inline" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 bg-red-50 text-red-600 rounded-xl font-bold ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-10 text-center text-slate-500">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
