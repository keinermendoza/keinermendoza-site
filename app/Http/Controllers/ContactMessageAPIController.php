<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMailToOwner;
use App\Mail\ContactMessageMailToUser;


class ContactMessageAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContactMessage::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'content' => 'required|string',
            'phone' => 'required|string',
        ]);
        $message = ContactMessage::create($data);

        Mail::to(config('app.email_owner'))->queue(
            new ContactMessageMailToOwner($message)
        );

        Mail::to($message->email)->queue(
            new ContactMessageMailToUser($message)
        );

        return response(null, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $message)
    {
        return $message->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactMessage $message)
    {
        $data = $request->validate([
            'phone' => 'sometimes|string',
            'is_spam' => 'sometimes|boolean',
            'readed' => 'sometimes|boolean',
        ]);
        $message->update($data);
        return $message->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return response(null, 204);
    }
}
