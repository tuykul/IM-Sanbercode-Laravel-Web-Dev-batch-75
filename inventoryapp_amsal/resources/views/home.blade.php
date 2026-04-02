@extends('layouts.app')

@section('title', 'Halaman Utama - SanberBook')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Home</h5>

            <h4 class="fw-semibold">Social Media Developer Santai Berkulitas</h4>
            <p class="text-muted">Belajar Dan Berbagi agar hidup ini semakin santai berkualitas</p>

            <h5 class="fw-semibold mt-4">Benefit Joint di SanberBook</h5>
            <ul class="list-unstyled">
                <li class="text-muted">Mendapatkan Motivasi dari sesama developer</li>
                <li class="text-muted">Sharing knowledge dari para mastah Sanber</li>
                <li class="text-muted">DIbuat oleh calon web developer terbaik</li>
            </ul>

            <h5 class="fw-semibold mt-4">Cara Bergabung ke SanberBook</h5>
            <ol>
                <li class="text-muted">Mengunjungi Website ini</li>
                <li class="text-muted">Mendaftar di <a href="{{ url('/register') }}" class="text-primary">Form Sign Up</a></li>
                <li class="text-muted">Selesai!</li>
            </ol>
        </div>
    </div>
@endsection
