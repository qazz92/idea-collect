<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    //
    public function get() {
        $credentials['email'] = 'besoftyoon@gmail.com';
        $credentials['password'] = 'asdf1231!';

        dd(\Auth::once($credentials));
    }
}
