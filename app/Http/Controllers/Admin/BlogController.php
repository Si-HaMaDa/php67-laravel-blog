<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();

        return view('admin.blogs.index', ['blogs' => $blogs]);
    }

    public function show($id)
    {
        $blog = Blog::findOrfail($id);

        return view('admin.blogs.show', ['blog' => $blog]);
    }

    public function delete($id)
    {
        $blog = Blog::findOrfail($id);

        $blog->delete();

        return redirect(route('admin.blogs.index'));
    }
}
