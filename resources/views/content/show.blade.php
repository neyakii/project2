@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #ffd6d6, #ffb3b3);
    }

    .card-title {
        color: #7b2cbf;
        font-weight: 700;
    }

    .badge.bg-info {
        background-color: #f29e9eff !important;
        color: #fff;
    }

    .card-text {
    font-size: 1.05rem;
    line-height: 1.4;   /* lebih rapat daripada 1.6 */
    color: #333;
    white-space: pre-line;
    margin-bottom: 0.6rem; /* biar spasi antar paragraf ga terlalu jauh */
    }


    .btn-secondary {
        background-color: #ffafcc;
        border-color: #ffafcc;
        color: #6a097d;
        font-weight: 600;
    }

    .btn-secondary:hover {
        background-color: #f48fb1;
        border-color: #f48fb1;
        color: #fff;
    }

    .card-img-top {
        width: 100%;  
        height: auto;
        max-height: 400px;
        object-fit: contain;
        background-color: #deababff;
        padding: 10px;
    }

    .card {
        border: none;
        border-radius: 20px;
    }

    .card-body {
        padding: 30px;
    }
</style>

<div class="container py-4">
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm rounded-4">
        @if($content->image)
        <img src="{{ asset('storage/' . $content->image) }}" class="card-img-top rounded-top-4" alt="{{ $content->title }}">
        @endif
        <div class="card-body">
            <h2 class="card-title">{{ $content->title }}</h2>
            <p class="text-muted mb-2">Kategori: <span class="badge bg-info">{{ $content->category->name }}</span></p>
            <p class="text-muted mb-1" style="font-size: 0.85rem;">
                Dibuat pada: {{ $content->created_at->format('d M Y') }}
            </p>
             <p class="text-muted mb-1" style="font-size: 0.85rem;">
                Oleh: {{ $content->user->name }}
            </p>
            <p class="card-text" style="white-space: pre-line;">{{ $content->body }}</p>
        </div>
    </div>
</div>
@endsection
