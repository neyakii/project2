<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function landing()
    {
        $contents = Content::with('category')->latest()->get();
        return view('landing', compact('contents'));
    }

    public function index()
    {
        $contents = Content::with('category')->get();
        return view('content.index', compact('contents'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('content.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('title', 'body', 'category_id');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Content::create($data);

        return redirect()->route('contents.index')->with('success', 'Konten berhasil ditambahkan.');
    }

    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('content.edit', compact('content', 'categories'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('title', 'body', 'category_id');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($content->image) Storage::disk('public')->delete($content->image);
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $content->update($data);

        return redirect()->route('contents.index')->with('success', 'Konten berhasil diupdate.');
    }

    public function destroy(Content $content)
    {
        if ($content->image) Storage::disk('public')->delete($content->image);
        $content->delete();
        return redirect()->route('contents.index')->with('success', 'Konten berhasil dihapus.');
    }

    public function show($id)
    {
        $content = Content::with('category')->findOrFail($id);
        return view('content.show', compact('content'));
    }

}