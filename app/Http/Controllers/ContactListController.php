<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactListController extends Controller
{
    public function view()
    {
        return view ("contact-list");
    }
}
