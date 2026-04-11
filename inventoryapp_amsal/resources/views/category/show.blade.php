@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title fw-semibold mb-0">Kategori: <span class="text-primary">{{ $category->name }}</span></h5>
            <a href="{{ url('/category') }}" class="btn btn-outline-secondary">Kembali</a>
        </div>

        <h6 class="mb-3">Daftar Buku dalam Kategori Ini:</h6>

        <div class="row">
            @forelse($category->books as $book)
            <div class="col-md-4 mb-3">
                <div class="card border">
                    <div class="card-body p-3">
                        <h6 class="fw-bold mb-1">{{ $book->name }}</h6>
                        <p class="mb-1 text-muted small">Harga: Rp {{ number_format($book->price, 0, ',', '.') }}</p>
                        <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">Stok: {{ $book->stock }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-light text-center border">
                    Belum ada buku yang terdaftar di kategori ini.
                </div>
            </div>
            @endforelse
        </div>

    </div>
</div>
@endsection
