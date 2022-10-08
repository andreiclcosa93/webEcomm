<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ManagerController extends Controller
{
    public function showStaff()
    {
        return view('admin.personal.staff-view');
    }

    public function newStaff()
    {
        return view('admin.personal.staff-new');
    }
}
