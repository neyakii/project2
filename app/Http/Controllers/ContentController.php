<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function landing(Request $request)
    {
        $query = Content::with('category');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('body', 'like', "%{$search}%")
                // cari berdasarkan nama pembuat
                ->orWhereHas('user', function($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%");
                });
            });
        }


        $contents = $query->latest()->paginate(3); 
        return view('landing', compact('contents'));
    }


    public function index()
   {
    if (Auth::user()->hasRole('admin')) {
        // Admin → semua konten
        $contents = Content::with('category', 'user')->latest()->get();
    } else {
        // User → hanya konten miliknya
        $contents = Content::with('category', 'user')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    return view('content.index', compact('contents'));
}

    public function create()
    {
        $categories = Category::all();
        return view('content.create', compact('categories'));
    }

    // Simpan konten baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Content::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'user_id' => Auth::id(), // 👈 penting biar gak error
        ]);

        return redirect()->route('contents.index')->with('success', 'Content created successfully.');
    }

   public function edit(Content $content)
   {
    // Jika user biasa, cek apakah konten miliknya
    if (Auth::user()->hasRole('user') && $content->user_id !== Auth::id()) {
        abort(403, 'Anda tidak punya izin untuk mengedit konten ini.');
    }

    $categories = Category::all();
    return view('content.edit', compact('content', 'categories'));
}


    public function update(Request $request, Content $content)
    {

         if (Auth::user()->hasRole('user') && $content->user_id !== Auth::id()) {
        abort(403, 'Anda tidak punya izin untuk mengupdate konten ini.');
    }
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

         if (Auth::user()->hasRole('user') && $content->user_id !== Auth::id()) {
        abort(403, 'Anda tidak punya izin untuk menghapus konten ini.');
    }

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