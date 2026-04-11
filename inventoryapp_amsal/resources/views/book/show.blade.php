@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="card">
    <div class="col-md-8 col-lg-6">
        <div class="card w-100">
            <div class="card-body">
                <img src="{{ asset('assets/images/products/' . $book->image) }}" class="img-fluid rounded mb-4" alt="Book Image" style="width: 100%; max-height: 400px; object-fit: cover;">

                <div class="">
                    <span class="badge bg-light text-primary mb-2">{{ $book->category->name ?? 'Tanpa Kategori' }}</span>
                    <h3 class="fw-semibold mb-2">{{ $book->name }}</h3>
                    <h4 class="text-primary fw-bold mb-3">Rp {{ number_format($book->price, 0, ',', '.') }}</h4>
                    <div class="mb-4">
                        <p class="text-primary">Jumlah stock: {{ $book->stock }}</p>
                    </div>
                </div>

                <div class="mb-3">
                    <h5 class="fw-semibold border-bottom pb-2 mb-3">Detail Buku</h5>
                    <p class="card-text text-muted" style="line-height: 1.6;">
                        {{ $book->description }}
                    </p>
                </div>

                <div class="d-flex gap-2 py-2">
                    <a href="{{ url('/book') }}" class="btn btn-secondary rounded-3 fw-semibold">Kembali</a>

                    @if(auth()->user()->role == 'staff')
                        <a href="{{ url('/transaction/create/' . $book->id) }}" class="btn btn-success rounded-3 fw-semibold px-4">Proses Transaksi</a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
