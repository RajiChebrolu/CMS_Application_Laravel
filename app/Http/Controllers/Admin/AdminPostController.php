<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
            abort(403, 'Access denied. Admins only.');
            }
            return $next($request);
        });
    }
    /**
     * Show all posts.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show a single post (optional).
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Edit a post.
     */
    public function edit(Post $post)
    {
        $users = User::all();
        return view('admin.posts.edit', compact('post', 'users'));
    }

    /**
     * Update a post.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'image' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp'],
        'user_id' => 'required|exists:users,id'
        ]);
        // update image if exists
        $path = $post->image ?? null;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
        }
        $path = Storage::disk('public')->put('post_images', $request->image);
        }

        // update the post
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);
        return redirect()->route('admin.posts.index')->with('success', 'Post updated.');
    }

    /**
     * Delete a Post.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }
}
