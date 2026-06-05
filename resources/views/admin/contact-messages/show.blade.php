@extends('layouts.admin', ['title' => 'Lead Detail'])

@section('content')
    @if(session('success'))
        <div class="mb-5 p-4 bg-emerald-100 text-emerald-800 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    @php
        $waText = rawurlencode("Hi {$contactMessage->parent_name}, thank you for your interest in Van Houten Football School. We would be happy to help schedule a trial class for {$contactMessage->child_name}.");
    @endphp

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border p-6 space-y-5">
            <div>
                <div class="text-sm text-slate-500">Parent Name</div>
                <div class="text-2xl font-black">{{ $contactMessage->parent_name }}</div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <div class="text-sm text-slate-500">Child Name</div>
                    <div class="font-bold">{{ $contactMessage->child_name ?: '-' }}</div>
                </div>
                <div>
                    <div class="text-sm text-slate-500">Child Age</div>
                    <div class="font-bold">{{ $contactMessage->child_age ?: '-' }}</div>
                </div>
            </div>

            <div>
                <div class="text-sm text-slate-500">Phone</div>
                <div class="font-bold">{{ $contactMessage->phone }}</div>
            </div>

            <div>
                <div class="text-sm text-slate-500">Email</div>
                <div class="font-bold">{{ $contactMessage->email ?: '-' }}</div>
            </div>

            <div>
                <div class="text-sm text-slate-500">Message</div>
                <p class="mt-2 text-slate-700 whitespace-pre-line">{{ $contactMessage->message ?: '-' }}</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactMessage->phone) }}?text={{ $waText }}" target="_blank" class="px-5 py-3 bg-emerald-600 text-white rounded-2xl font-black">
                    Reply via WhatsApp
                </a>

                <a href="{{ route('admin.contact-messages.index') }}" class="px-5 py-3 bg-slate-100 rounded-2xl font-black">
                    Back
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border p-6">
            <h2 class="text-xl font-black">Lead Status</h2>

            <form method="POST" action="{{ route('admin.contact-messages.update', $contactMessage) }}" class="mt-5 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">Status</label>
                    <select name="status" class="w-full rounded-2xl border-slate-300 p-4">
                        @foreach(['new', 'contacted', 'trial_scheduled', 'registered', 'lost'] as $status)
                            <option value="{{ $status }}" @selected($contactMessage->status === $status)>
                                {{ str_replace('_', ' ', ucfirst($status)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2">Admin Notes</label>
                    <textarea name="admin_notes" rows="6" class="w-full rounded-2xl border-slate-300 p-4">{{ $contactMessage->admin_notes }}</textarea>
                </div>

                <button class="w-full px-5 py-3 bg-slate-950 text-white rounded-2xl font-black">
                    Save Lead Update
                </button>
            </form>
        </div>
    </div>
@endsection
