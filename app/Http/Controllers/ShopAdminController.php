<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopAdminController extends Controller
{
    public function view()
    {
        return view ("shop-admin");
    }
}
