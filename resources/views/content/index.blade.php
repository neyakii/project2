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

    .btn-primary {
        background-color: #c77dff;
        border-color: #c77dff;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #7b2cbf;
        border-color: #7b2cbf;
    }

    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: #fff0f5;
    }

    .table th {
        background-color: #ffb3b3;
        color: #3c096c;
        border-bottom: 2px solid #ff7f7f;
    }

    .table td {
        vertical-align: middle;
    }

    .btn-warning {
        background-color: #ffafcc;
        border-color: #ffafcc;
        color: #6a097d;
    }

    .btn-warning:hover {
        background-color: #f48fb1;
        border-color: #f48fb1;
    }

    .btn-danger {
        background-color: #ff6b6b;
        border-color: #ff6b6b;
    }

    .btn-danger:hover {
        background-color: #e63946;
        border-color: #e63946;
    }
</style>

<h2>Data Konten Classmeet</h2>
<a href="{{ route('contents.create') }}" class="btn btn-primary mb-3">+ Tambah Konten</a>
<table class="table table-striped">
    <thead><tr><th>No</th><th>Judul</th><th>Kategori</th><th>Gambar</th><th>Aksi</th></tr></thead>
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
                <a href="{{ route('contents.edit', $content) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('contents.destroy', $content) }}" method="POST" class="d-inline">@csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection