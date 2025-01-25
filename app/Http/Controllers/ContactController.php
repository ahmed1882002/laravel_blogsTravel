<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store_contact(Request $request)
    {
        $data_store = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'message' => 'required|min:10',

        ]);
        Contact::create($data_store);
        return back()->with('status_sc','Your message was transmitted ' ) ;

    }
}
