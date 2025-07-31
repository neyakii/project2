@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #ffd6d6, #ffb3b3);
    }

    .hero-section {
        text-align: center;
        padding: 80px 20px 50px;
        background: linear-gradient(135deg, #ff4d6d, #e60039);
        color: white;
        border-radius: 0 0 50px 50px;
        margin-bottom: 40px;
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 800;
    }

    .hero-section p {
        font-size: 1.2rem;
        opacity: 0.95;
        margin-top: 10px;
    }

    .card-custom {
        transition: 0.3s;
        border: none;
        border-radius: 20px;
        overflow: hidden;
    }

    .card-custom:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .btn-view {
        border-radius: 20px;
        font-weight: 600;
        color: #cc0044;
        border-color: #cc0044;
    }

    .btn-view:hover {
        background-color: #cc0044;
        color: #fff;
    }

    .card-title {
        color: #990033;
    }

    .badge-custom {
        background-color: #ff4d6d;
        color: white;
        font-size: 0.75rem;
        border-radius: 10px;
        padding: 5px 10px;
    }

    .no-content {
        font-size: 1.1rem;
        color: #777;
        padding: 60px 0;
        text-align: center;
    }
</style>

<div class="hero-section">
    <h1>🎉 Classmeet SMKN 5 Malang 🎉</h1>
    <p>Tunjukkan semangat, kreativitas, dan kebersamaan kalian di event tahunan yang paling dinanti!</p>
</div>

<div class="container pb-5">
    <div class="row">
        @forelse($contents as $content)
        <div class="col-md-4 mb-4">
            <div class="card card-custom h-100 shadow-sm">
                @if($content->image)
                <img src="{{ asset('storage/' . $content->image) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $content->title }}">
                @endif
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title fw-bold">{{ $content->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($content->body, 100) }}</p>
                        <span class="badge badge-custom">{{ $content->category->name }}</span>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('contents.show', $content->id) }}" class="btn btn-outline-primary btn-view w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 no-content">
            <p>📭 Belum ada konten yang ditambahkan. Yuk mulai buat kenangan!</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
