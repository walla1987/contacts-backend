<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function create(Request $request)
    {
        return Contact::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'dob' => $request->input('dob'),
            'telephone' => $request->input('telephone'),
            'contact_type_id' => $request->input('contact_type_id')
        ]);
    }

    public function delete(int $id)
    {
        return Contact::where('id', $id)->delete();
    }


}
