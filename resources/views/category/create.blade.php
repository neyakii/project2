@extends('layouts.app')

@section('content')
<h2>{{ isset($category) ? 'Edit' : 'Tambah' }} Kategori</h2>
<form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="POST">
    @csrf
    @if(isset($category)) @method('PUT') @endif
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection