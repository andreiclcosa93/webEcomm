<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function showControlPanel()
    {
        return view('admin.personal.cpanel');
    }
}
