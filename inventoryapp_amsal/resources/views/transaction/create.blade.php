@extends('layouts.app')

@section('title', 'Buat Transaksi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h4 class="mb-4 fw-semibold">Proses Transaksi</h4>

                <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
                    <img src="{{ asset('assets/images/products/' . $book->image) }}" class="rounded" style="width: 80px; height: 80px; object-fit: cover; margin-right: 15px;">
                    <div>
                        <h5 class="mb-1">{{ $book->name }}</h5>
                        <p class="mb-0 text-primary fw-bold">Rp {{ number_format($book->price, 0, ',', '.') }}</p>
                        <small class="text-muted">Sisa Stok: <strong>{{ $book->stock }}</strong></small>
                    </div>
                </div>

                @if($errors->any())
                  <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                <form action="{{ url('/transaction/' . $book->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Transaksi</label>
                        <select class="form-select form-select-lg" name="type" required>
                            <option value="" disabled selected>Pilih...</option>
                            <option value="in">Barang Masuk (Tambah Stok)</option>
                            <option value="out">Barang Keluar (Terjual)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Jumlah</label>
                        <input type="number" class="form-control form-control-lg" name="quantity" min="1" required placeholder="Masukkan jumlah...">
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ url('/book') }}" class="btn btn-secondary w-50 py-2">Batal</a>
                        <button type="submit" class="btn btn-success w-50 py-2">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
