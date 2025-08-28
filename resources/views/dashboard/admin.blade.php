@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #ffd6d6, #ffb3b3);
    }

    .dashboard-wrapper {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .dashboard-card {
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 32px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        width: 100%;
        text-align: center;
    }

    .profile-circle {
        width: 100px;
        height: 100px;
        background-color: #e63946;
        color: white;
        font-size: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto 20px;
    }

    .menu-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .menu-card {
        background: #fff;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.1);
        transition: 0.3s;
        text-decoration: none;
        color: #333;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .menu-card h4 {
        margin-top: 15px;
        font-weight: bold;
        color: #e63946;
    }

    .menu-icon {
        font-size: 40px;
        color: #e63946;
    }

    .btn-back {
        margin-top: 25px;
        display: inline-block;
        padding: 10px 25px;
        border-radius: 50px;
        border: 2px solid #e63946;
        color: #e63946;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-back:hover {
        background-color: #e63946;
        color: #fff;
    }
</style>

<div class="dashboard-wrapper">
    <div class="dashboard-card">
        {{-- Foto Profil --}}
        @if (Auth::user()->profile_photo_url)
            <img src="{{ Auth::user()->profile_photo_url }}"
                 alt="Foto Profil"
                 class="rounded-circle mb-3"
                 style="width: 100px; height: 100px; object-fit: cover;">
        @else
            <div class="profile-circle">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        @endif

        {{-- Sapaan --}}
        <h2 class="fw-bold text-danger">Halo, {{ Auth::user()->name }} 👋</h2>
        <p class="text-muted">Selamat datang di dashboard Admin Classmeet SMKN 5 Malang!</p>

        {{-- Menu Cards --}}
        <div class="menu-cards">
            <a href="{{ route('contents.index') }}" class="menu-card">
                <div class="menu-icon">📝</div>
                <h4>Kelola Konten</h4>
                <p>Tambah, edit, dan hapus konten acara classmeet.</p>
            </a>
            <a href="{{ route('categories.index') }}" class="menu-card">
                <div class="menu-icon">📂</div>
                <h4>Kelola Kategori</h4>
                <p>Atur kategori agar konten lebih terorganisir.</p>
            </a>
            <a href="{{ route('users.index') }}" class="menu-card">
                <div class="menu-icon">👥</div>
                <h4>Daftar User</h4>
                <p>Lihat dan kelola data pengguna sistem.</p>
            </a>
        </div>

        <a href="{{ url('/') }}" class="btn-back">⬅ Kembali ke Beranda</a>
    </div>
</div>
@endsection
