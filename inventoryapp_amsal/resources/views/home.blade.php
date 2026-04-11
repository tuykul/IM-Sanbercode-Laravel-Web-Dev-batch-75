@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold">Selamat Datang, {{ auth()->user()->name }}! </h4>
    <p class="text-muted">Ini adalah ringkasan sistem inventori buku lu hari ini.</p>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white">
            <div class="card-body p-4 text-center">
                <h6 class="fw-semibold opacity-75">Total Buku</h6>
                <h2 class="fw-bold mb-0">{{ $totalBooks }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-success text-white">
            <div class="card-body p-4 text-center">
                <h6 class="fw-semibold opacity-75">Kategori</h6>
                <h2 class="fw-bold mb-0">{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-warning text-dark">
            <div class="card-body p-4 text-center">
                <h6 class="fw-semibold opacity-75">Total Transaksi</h6>
                <h2 class="fw-bold mb-0">{{ $totalTransactions }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-semibold mb-0">5 Transaksi Terakhir</h5>
                    <a href="{{ url('/transaction') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap align-middle">
                        <thead class="text-muted">
                            <tr>
                                <th>Buku</th>
                                <th>Tipe</th>
                                <th>Qty</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentTransactions as $trx)
                            <tr>
                                <td><span class="fw-semibold">{{ $trx->book->name }}</span></td>
                                <td>
                                    @if($trx->type == 'in')
                                        <span class="badge bg-success">Masuk</span>
                                    @else
                                        <span class="badge bg-danger">Keluar</span>
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $trx->quantity }}</td>
                                <td class="text-muted small">{{ $trx->created_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-3 text-muted">Belum ada transaksi hari ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5 class="fw-semibold mb-4 text-danger"><i class="bi bi-exclamation-triangle"></i> Stok Menipis</h5>

                @forelse($lowStockBooks as $book)
                    <div class="d-flex justify-content-between align-items-center mb-3 p-2 border rounded bg-light">
                        <div>
                            <h6 class="mb-0 fw-semibold">{{ $book->name }}</h6>
                            <small class="text-muted">Kategori: {{ $book->category->name ?? '-' }}</small>
                        </div>
                        <span class="badge bg-danger fs-6">{{ $book->stock }}</span>
                    </div>
                @empty
                    <div class="alert alert-success border-0 text-center">
                        Semua stok buku dalam kondisi aman!
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
