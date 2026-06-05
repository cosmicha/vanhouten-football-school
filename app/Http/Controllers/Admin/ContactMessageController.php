<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        $contactMessage->update(['is_read' => true]);

        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        $data = $request->validate([
            'status' => 'required|string',
            'admin_notes' => 'nullable|string',
        ]);

        $contactMessage->update($data);

        return back()->with('success', 'Lead updated.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return back()->with('success', 'Message deleted.');
    }
}
