<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Menampilkan formulir untuk membuat postingan baru
    public function create()
    {
        return view('posts.create');
    }

    // Menyimpan postingan baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Menangani upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

        // Simpan data ke database
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => $imagePath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    // Menampilkan daftar postingan
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }
}
