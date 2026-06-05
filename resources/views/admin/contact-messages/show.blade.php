@extends('layouts.admin', ['title' => 'Message Detail'])

@section('content')
    <div class="max-w-3xl bg-white rounded-3xl shadow-sm border p-6 space-y-5">
        <div>
            <div class="text-sm text-slate-500">Parent Name</div>
            <div class="text-xl font-black">{{ $contactMessage->parent_name }}</div>
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

        <div class="flex gap-3">
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contactMessage->phone) }}" target="_blank" class="px-5 py-3 bg-emerald-600 text-white rounded-2xl font-black">
                Reply via WhatsApp
            </a>

            <a href="{{ route('admin.contact-messages.index') }}" class="px-5 py-3 bg-slate-100 rounded-2xl font-black">
                Back
            </a>
        </div>
    </div>
@endsection
