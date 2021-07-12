<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    /**
     * @return Contact[]|Collection
     */
    public function getList()
    {
        return Contact::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getContact($id)
    {
        return Contact::select('contacts.*', 'contact_types.title as contact_type')
            ->join('contact_types', 'contact_types.id', '=', 'contacts.contact_type_id')
            ->where('contacts.id', $id)
            ->first();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        return Contact::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'dob' => Carbon::parse($request->input('dob'))->toDateString(),
            'telephone' => $request->input('telephone'),
            'contact_type_id' => $request->input('contact_type_id')
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, int $id)
    {
        return Contact::where('id', $id)->update($request->all());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return Contact::where('id', $id)->delete();
    }
}
