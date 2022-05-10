<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function blogs()
    {
        // return 'Blogs form Controller!';

        $blogs = Blog::all();

        return view('blogs', ['blogs' => $blogs]);
    }

    public function blogsSingle($id)
    {
        // return 'Blogs Single form Controller!';

        // $blog = Blog::where('id', $id)->first();
        $blog = Blog::findOrfail($id);

        // dd($blog);

        return view('blog-single', ['blog' => $blog]);

        // return view('blog-single', compact(['blog']));

        // return view('blog-single')->with('blog', $blog);
    }
}
