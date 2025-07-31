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

<h2>Data Kategori</h2>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>
<table class="table table-bordered">
    <thead><tr><th>No</th><th>Nama</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($categories as $index => $category)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">@csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection