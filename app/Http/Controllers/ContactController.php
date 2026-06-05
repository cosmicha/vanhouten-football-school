<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'parent_name' => 'required|string|max:255',
            'child_name' => 'nullable|string|max:255',
            'child_age' => 'nullable|string|max:50',
            'phone' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'message' => 'nullable|string',
        ]);

        ContactMessage::create($data);

        return back()->with('contact_success', 'Thank you. Your trial class request has been submitted.');
    }
}
