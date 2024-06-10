<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
class PostController extends Controller
{
    public function index()
    { 
        $posts = Post::paginate(10);
        return view('post.index')->with(['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data ['name'] = $request->name;
        $data ['description'] = $request->description;
        $data ['age'] = $request->age;

        Post::create($data);

        return redirect()->route('posts.index')
            ->withSuccess('New product is added successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show')->with(['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit')->with(['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2|max:255',
            'age' => 'required|integer',
        ]);

        $post = Post::findOrFail($id);

        $post->update($data);

        return redirect()->route('posts.index')
        ->withSuccess('updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('posts.index')
            ->withSuccess('deleted successfully.');
    }
}
