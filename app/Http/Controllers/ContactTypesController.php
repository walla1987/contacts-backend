<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ContactTypesController extends Controller
{
    /**
     * @return ContactType[]|Collection
     */
    public function getTypes()
    {
        return ContactType::all();
    }
}
