<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('bookings.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        // Send email to admin
        try {
            Mail::to(config('mail.from.address'))->send(new ContactMessage($request->all()));
        } catch (\Exception $e) {
            // Silent fail
        }

        return back()->with('success', 'Your message has been sent successfully. We will get back to you shortly.');
    }
}