@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="fw-semibold mb-4">Pengaturan Profil</h4>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                <form action="{{ url('/profile') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-muted">Nama Akun</label>
                        <input type="text" class="form-control bg-light" value="{{ $user->name }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-muted">Email</label>
                        <input type="email" class="form-control bg-light" value="{{ $user->email }}" readonly>
                    </div>

                    <hr class="mb-4">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nomor HP / WhatsApp</label>
                        <input type="text" class="form-control" name="phone" value="{{ $user->profile->phone ?? '' }}" required placeholder="Contoh: 081234567890">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat Lengkap</label>
                        <textarea class="form-control" name="address" rows="3" required placeholder="Masukkan alamat lengkap lu di sini...">{{ $user->profile->address ?? '' }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Simpan Perubahan</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
