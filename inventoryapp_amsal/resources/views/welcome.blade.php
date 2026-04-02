@extends('layouts.app')

@section('title', 'Welcome - SanberBook')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Dashboard</h5>

            <h3 class="fw-semibold">Selamat Datang {{ $fname }}</h3>
            <p class="text-muted fs-5">Terima kasih telah bergabung di Sanberbook. Social Media kita bersama!</p>
        </div>
    </div>
@endsection
