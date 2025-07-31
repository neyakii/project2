@extends('layouts.app')

@section('content')
<h2>{{ isset($content) ? 'Edit' : 'Tambah' }} Konten</h2>
<form action="{{ isset($content) ? route('contents.update', $content) : route('contents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($content)) @method('PUT') @endif
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $content->title ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label>Isi</label>
        <textarea name="body" class="form-control" rows="4">{{ old('body', $content->body ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-select">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ (old('category_id', $content->category_id ?? '') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Gambar (opsional)</label>
        <input type="file" name="image" class="form-control">
        @if(isset($content) && $content->image)
            <img src="{{ asset('storage/' . $content->image) }}" width="100" class="mt-2">
        @endif
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection