<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        
        $data = request()->validate([
            'name' => 'required',
            'email  ' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to('test@test.com')->send(new ContactFormMail($data));
        //dd(request()->all());

        return redirect('contact');
    }
}
