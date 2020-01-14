<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class birthdayController extends Controller
{
    function updates() {

        return view('home_include.updateBday');
    }
}
