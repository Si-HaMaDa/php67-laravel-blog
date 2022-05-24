<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('user')->get();

        return view('admin.blogs.index', ['blogs' => $blogs]);
    }

    public function create()
    {
        $users = User::select('id', 'name')->get();
        $tags = Tag::select('id', 'name')->get();
        return view('admin.blogs.create', ['users' => $users, 'tags' => $tags]);
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

        $blog = Blog::create($data);

        $blog->tags()->sync($data['tags']);

        return redirect(route('admin.blogs.index'))->with('success', 'Blog inserted!');
    }

    public function show($id)
    {
        $blog = Blog::findOrfail($id);

        return view('admin.blogs.show', ['blog' => $blog]);
    }

    public function edit($id)
    {
        $blog = Blog::findOrfail($id);
        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255|min:5',
            'content' => 'required',
            'user_id' => 'required|integer',
            'image' => ['nullable', 'image'],
        ]);

        $data = $request->all();

        if (isset($request->image)) {
            \Storage::delete($blog->image);
            $image = $request->file('image')->store('blogs');
            $data['image'] = $image;
        }

        $blog->update($data);

        return redirect(route('admin.blogs.index'))->with('success', __('blogs.blog_updated'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrfail($id);

        $blog->delete();

        return redirect(route('admin.blogs.index'))->with('success', 'Blog deleted!');
    }
}
