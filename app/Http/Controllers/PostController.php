<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // seluruh data
    public function post_index()
    {
        $posts = Post::all();
        return view('/admin/posts/admin_post', compact('posts'));
    }

    // create data 
    public function create()
    {
        return view('admin.posts.create_post');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'nullable',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Validasi gambar
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('path-to-images'), $imageName);
            $data['image'] = $imageName;
        }

        Post::create($data);

        return redirect()->route('admin.post.get')->with('success_post_create', 'Post created successfully!');
    }

    // edit data
    public function edit_posts($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit_posts', compact('post'));
    }

    public function update_posts(Request $request, $id)
    {
        $post           = Post::findOrFail($id);
        // simpan perubahan
        $post->title    = $request->title;
        $post->content  = $request->content;
        $post->image    = $request->image;
        $post->save();

        $data = $request->except('_token', '_method');

        $post->update($data);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('path-to-images'), $imageName);
            $data['image'] = $imageName;

            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::delete('path-to-images/' . $post->image);
            }
        }

        $post->update($data);

        return redirect()->route('admin.post.get')->with('success_post_edit', 'Post updated successfully!');
    }

    public function delete_posts(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.post.get')->with('success_post_delete','Delete success!');
        
    }
}
