<?php

namespace App\Http\Controllers;

use App\Models\Main_course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index', ["title" => "Dashboard"], compact([]));
    }
}
