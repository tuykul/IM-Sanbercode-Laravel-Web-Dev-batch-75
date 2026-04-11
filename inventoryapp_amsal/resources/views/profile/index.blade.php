@extends('layouts.app')
@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="fw-semibold mb-4">Pengaturan Profil</h5>
        <form action="{{ url('/profile') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control bg-light" value="{{ $user->name }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input type="text" name="phone" class="form-control" value="{{ $user->profile->phone ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="address" class="form-control" rows="3" required>{{ $user->profile->address ?? '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Profil</button>
        </form>
    </div>
</div>
@endsection
