<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function home()
    {
        // return 'Home form Controller!';
        return view('home');
    }

    public function contact()
    {
        // return 'Contact from Controller!';
        return view('contact');
    }

    public function contactSend()
    {
        // return 'Contact Send from Controller!';
        dd(request()->all());
    }
}
