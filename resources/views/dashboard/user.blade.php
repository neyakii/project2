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
        background: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 32px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        max-width: 700px;
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

    .btn-back {
        margin-top: 30px;
        display: inline-block;
        padding: 12px 30px;
        border-radius: 50px;
        border: 2px solid #e63946;
        color: #e63946;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-back:hover {
        background-color: #ff4d6d;
        color: #fff;
        transform: translateY(-3px);
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
        <p class="text-muted">Selamat datang di halaman User Classmeet SMKN 5 Malang!</p>

        {{-- Tombol kembali --}}
        <a href="{{ route('landing') }}" class="btn-back">⬅ Kembali ke Beranda</a>
    </div>
</div>
@endsection
