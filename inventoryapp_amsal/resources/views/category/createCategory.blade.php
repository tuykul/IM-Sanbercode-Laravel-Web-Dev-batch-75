@extends('layouts.app')

@section('title', 'Tambah Category')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tambah Category Baru</h5>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ url('/category') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label fw-semibold">Nama Category</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan nama kategori..." required>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ url('/category') }}" class="btn btn-secondary rounded-2 px-4">Batal</a>
                <button type="submit" class="btn btn-primary rounded-2 px-4">Simpan</button>
            </div>
        </form>

    </div>
</div>
@endsection
