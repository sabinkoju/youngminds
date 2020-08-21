<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id', 'desc')->get();
        return view('Post/view', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Post/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $photo = time() . '.' . $image->getClientOriginalExtension();
            $resize = Image::make($image);
            $resize->resize('600', '600')->save('images/' . $photo);
            $post->image = $photo;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('Post/edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::find($id);

        if ($request->hasFile('image')) {
            if ($post->image != null) {
                unlink(public_path() . '/images/' . $post->image);
            }
            $featured = $request->file('image');
            $name = time() . '.' . $featured->getClientOriginalExtension();

            $resize = Image::make($featured);
            $resize->resize('600', '600')->save('images/' . $name);

            $post->image = $name;
        } else {
            $post->image = $post->image;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $update = $post->save();
        if ($update) {
            return redirect()->route('post.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $image_path = public_path() . '/images/' . $post->image;
        unlink($image_path);
        $post->delete();

        return redirect()->route('post.index');
    }
}
