@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #ffd6d6, #ffb3b3); /* merah pastel lebih tegas */
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
        max-width: 500px;
        text-align: center;
    }

    .profile-circle {
        width: 100px;
        height: 100px;
        background-color: #e63946; /* merah lembut tapi kuat */
        color: white;
        font-size: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto 20px;
    }

    .btn-glow {
        background-color: #e63946;
        border: none;
        color: white;
        padding: 12px 30px;
        font-weight: 500;
        border-radius: 50px;
        transition: 0.3s;
    }

    .btn-glow:hover {
        background-color: #b0212a;
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
        <p class="text-muted mb-4">Selamat datang di dashboard Classmeet SMKN 5 Malang!</p>

        <a href="{{ url('/') }}" class="btn btn-glow">Kembali ke Beranda</a>
    </div>
</div>
@endsection
