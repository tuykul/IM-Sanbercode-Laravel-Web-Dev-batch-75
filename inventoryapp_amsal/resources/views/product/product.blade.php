@extends('layouts.app')

@section('title', 'book')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">List book</h5>

        @if(auth()->user()->role == 'admin')
            <a href="{{ url('/book/create') }}" class="btn btn-primary mb-4">Tambah</a>
        @endif

        <div class="row">
            @foreach($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('assets/images/products/' . $book->image) }}" class="card-img-top" alt="{{ $book->name }}" style="height: 200px; object-fit: cover;">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0">{{ $book->name }}</h5>
                            <span class="badge bg-light text-primary">{{ $book->category->name }}</span>
                        </div>

                        <p class="text-primary fw-bold mb-1">Rp {{ number_format($book->price, 0, ',', '.') }}</p>
                        <p class="text-muted small">Stock: {{ $book->stock }}</p>
                        <p class="card-text text-truncate" style="max-width: 100%;">{{ $book->description }}</p>

                        <a href="{{ url('/book/' . $book->id) }}" class="btn btn-outline-primary w-100 mb-3">Read more</a>

                        @if(auth()->user()->role == 'admin')
                            <div class="d-flex justify-content-between gap-2">
                                <a href="{{ url('/book/' . $book->id . '/edit') }}" class="btn btn-warning btn-sm flex-grow-1 py-2">Edit</a>
                                <form action="{{ url('/book/' . $book->id) }}" method="POST" class="flex-grow-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100 py-2" onclick="return confirm('Yakin mau hapus produk ini?')">Delete</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ url('/transaction/' . $book->id) }}" class="btn btn-success w-100 py-2">Buat Transaksi</a>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
