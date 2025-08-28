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
        background-color: #7b2cbf;
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

<div class="container mb-4">
    <form action="{{ route('landing') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" 
               placeholder="Cari konten..." value="{{ request('search') }}">
        <button class="btn btn-danger" type="submit">Search</button>
    </form>
</div>


<div class="container pb-5">
    <div class="row">
        @forelse($contents as $content)
        <div class="col-12 mb-4"> <!-- full width, satu per baris -->
            <div class="card card-custom shadow-sm">
                <div class="row g-0">
                    @if($content->image)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $content->image) }}" 
                             class="img-fluid rounded-start" 
                             style="height: 100%; object-fit: cover;" 
                             alt="{{ $content->title }}">
                    </div>
                    @endif
                    <div class="col-md-8">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="card-title fw-bold">{{ $content->title }}</h4>
                                <p class="card-text text-muted">
                                    {{ Str::limit($content->body, 300) }}
                                </p>
                                <p class="text-muted mb-1" style="font-size: 0.85rem;">
                                    Dibuat pada: {{ $content->created_at->format('d M Y') }}
                                </p>
                                <p class="text-muted mb-1" style="font-size: 0.85rem;">
                                    Oleh: {{ $content->user->name }}
                                </p>
                                <span class="badge badge-custom">{{ $content->category->name }}</span>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('contents.show', $content->id) }}" 
                                   class="btn btn-outline-primary btn-view">
                                   Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
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

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $contents->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection