<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    public function index(){
        return view('admin.registrantion');
    }
}
