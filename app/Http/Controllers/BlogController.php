<?php

namespace App\Http\Controllers;

class BlogController extends Controller
{
    public function blogs()
    {
        // return 'Blogs form Controller!';
        return view('blogs');
    }

    public function blogsSingle()
    {
        // return 'Blogs Single form Controller!';
        return view('blog-single');
    }
}
