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

    /* === STYLE BUTTON (konsisten kayak sebelumnya) === */
    .btn-custom {
        background-color: #ffafcc;
        border: none;
        color: #6a097d;
        font-weight: 600;
        border-radius: 10px;
        padding: 6px 14px;
        transition: 0.3s ease-in-out;
    }

    .btn-custom:hover {
        background-color: #f48fb1;
        color: #fff;
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
        background-color: #c77dff;
        color: #fff;
    }

    .btn-custom-secondary:hover {
        background-color: #7b2cbf;
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
    }

    .table td {
        vertical-align: middle;
    }
</style>

<div class="container py-5">
    <h2>Daftar User</h2>

    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-custom-secondary">⬅ Kembali</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
