<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return \Response::json([
            'status' => true,
            'message' => __('blogs.blogs_retrievd'),
            'blogs' => $blogs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255|min:5',
            'content' => 'required',
            'user_id' => 'required|integer',
            'image' => ['nullable', 'image'],
        ]);

        if ($validator->fails()) {
            return \Response::json([
                'status' => false,
                'message' => __('blogs.check_empty_data')
            ]);
        }

        $data = $request->all();

        if (isset($request->image)) {
            $image = $request->file('image')->store('blogs');
            $data['image'] = $image;
        }

        Blog::create($data);

        return \Response::json([
            'status' => true,
            'message' => __('blogs.add_blog')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return \Response::json([
                'status' => false,
                'message' => __('blogs.blogs_not_found'),
            ]);
        }

        return \Response::json([
            'status' => true,
            'message' => __('blogs.blogs_retrievd'),
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return \Response::json([
                'status' => false,
                'message' => __('blogs.blogs_not_found'),
            ]);
        }

        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255|min:5',
            'content' => 'nullable',
            'user_id' => 'nullable|integer',
            'image' => ['nullable', 'image'],
        ]);

        if ($validator->fails()) {
            return \Response::json([
                'status' => false,
                'message' => __('blogs.check_empty_data')
            ]);
        }

        $data = $request->all();

        if (isset($request->image)) {
            \Storage::delete($blog->image);
            $image = $request->file('image')->store('blogs');
            $data['image'] = $image;
        }

        $blog->update($data);

        return \Response::json([
            'status' => true,
            'message' => __('blogs.blog_updated')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return \Response::json([
                'status' => false,
                'message' => __('blogs.blogs_not_found'),
            ]);
        }

        $blog->delete();
        return \Response::json([
            'status' => true,
            'message' => __('blogs.blogs_deleted'),
        ]);
    }
}
