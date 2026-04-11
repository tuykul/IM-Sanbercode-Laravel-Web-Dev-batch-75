@extends('layouts.app')

@section('title', 'Category')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tampil Category</h5>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <a href="{{ url('/category/create') }}" class="btn btn-primary mb-4">Tambah</a>

        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle text-center">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">No</h6></th>
                        <th class="border-bottom-0 text-start"><h6 class="fw-semibold mb-0">Name</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Total Produk</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Action</h6></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $cat)
                    <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6></td>
                        <td class="border-bottom-0 text-start"><span class="fw-normal">{{ $cat->name }}</span></td>

                        <td class="border-bottom-0">
                            <span class="badge bg-light text-dark border">{{ $cat->books->count() }} Produk</span>
                        </td>

                        <td class="border-bottom-0">
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <a href="{{ url('/category/' . $cat->id . '/edit') }}" class="badge bg-secondary rounded-3 fw-semibold text-white px-3 py-2">Edit</a>

                                <form action="{{ url('/category/' . $cat->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger rounded-3 fw-semibold text-white px-3 py-2 border-0" onclick="return confirm('Yakin hapus kategori ini?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
