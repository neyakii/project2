@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #ffd6d6, #ffb3b3);
    }

    h2 {
        color: #7b2cbf;
        font-weight: 700;
        margin-bottom: 20px;
    }

    /* === STYLE BUTTON KONSISTEN === */
    .btn-custom {
        border: none;
        font-weight: 600;
        border-radius: 10px;
        padding: 6px 14px;
        transition: 0.3s ease-in-out;
    }

    .btn-custom-primary {
        background-color: #c77dff;
        color: #fff;
    }
    .btn-custom-primary:hover {
        background-color: #7b2cbf;
        color: #fff;
    }

    .btn-custom-secondary {
        background-color: #ffafcc;
        color: #6a097d;
    }
    .btn-custom-secondary:hover {
        background-color: #f48fb1;
        color: #fff;
    }

    .btn-custom-warning {
        background-color: #ffafcc;
        color: #6a097d;
    }
    .btn-custom-warning:hover {
        background-color: #f48fb1;
        color: #fff;
    }

    .btn-custom-danger {
        background-color: #ff6b6b;
        color: #fff;
    }
    .btn-custom-danger:hover {
        background-color: #e63946;
        color: #fff;
    }

    /* === TABLE === */
    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #fff0f5;
    }

    .table th {
        background-color: #ffb3b3;
        color: #3c096c;
        border-bottom: 2px solid #ff7f7f;
        text-align: center;
    }

    .table td {
        vertical-align: middle;
        text-align: center;
    }

    img {
        border-radius: 8px;
    }
</style>

<div class="container py-5">
    <h2>Data Konten Classmeet</h2>

    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('landing') }}" class="btn btn-custom btn-custom-secondary">⬅ Kembali</a>
        <a href="{{ route('contents.create') }}" class="btn btn-custom btn-custom-primary">+ Tambah Konten</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contents as $index => $content)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $content->title }}</td>
                <td>{{ $content->category->name }}</td>
                <td>
                    @if($content->image)
                        <img src="{{ asset('storage/' . $content->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('contents.edit', $content) }}" class="btn btn-sm btn-custom btn-custom-warning">Edit</a>
                    <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-sm btn-custom btn-custom-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
