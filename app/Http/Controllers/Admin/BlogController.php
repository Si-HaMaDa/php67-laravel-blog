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

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255|min:5',
            'content' => 'required',
            'user_id' => 'required|integer',
            'image' => ['nullable', 'image'],
        ]);

        $data = $request->all();

        if (isset($request->image)) {
            $image = $request->file('image')->store('blogs');
            $data['image'] = $image;
        }

        /* $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = $request->user_id;
        $blog->image = $image;
        $blog->save(); */

        Blog::create($data);

        return redirect(route('admin.blogs.index'))->with('success', 'Blog inserted!');
    }

    public function show($id)
    {
        $blog = Blog::findOrfail($id);

        return view('admin.blogs.show', ['blog' => $blog]);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrfail($id);

        $blog->delete();

        return redirect(route('admin.blogs.index'))->with('success', 'Blog deleted!');
    }
}
