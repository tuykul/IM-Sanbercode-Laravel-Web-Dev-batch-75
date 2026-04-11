@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Riwayat Transaksi</h5>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle text-center">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">No</h6></th>
                        <th class="border-bottom-0 text-start"><h6 class="fw-semibold mb-0">Tanggal</h6></th>
                        <th class="border-bottom-0 text-start"><h6 class="fw-semibold mb-0">Kasir/Staff</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Tipe</h6></th>
                        <th class="border-bottom-0 text-start"><h6 class="fw-semibold mb-0">Buku</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Harga Satuan</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Jumlah</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Total</h6></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $index => $trx)
                    <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6></td>
                        <td class="border-bottom-0 text-start">
                            <span class="fw-normal">{{ $trx->created_at->format('d M Y, H:i') }}</span>
                        </td>
                        <td class="border-bottom-0 text-start">
                            <span class="badge bg-light text-dark border">{{ $trx->user->name }}</span>
                        </td>

                        <td class="border-bottom-0">
                            @if($trx->type == 'in')
                                <span class="badge bg-success">Stok Masuk</span>
                            @else
                                <span class="badge bg-danger">Stok Keluar (Terjual)</span>
                            @endif
                        </td>

                        <td class="border-bottom-0 text-start">
                            <h6 class="fw-semibold mb-1">{{ $trx->book->name }}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <span class="fw-normal">Rp {{ number_format($trx->book->price, 0, ',', '.') }}</span>
                        </td>
                        <td class="border-bottom-0">
                            <span class="fw-bold">{{ $trx->quantity }}</span>
                        </td>
                        <td class="border-bottom-0">
                            <span class="text-success fw-bold">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum ada data transaksi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
