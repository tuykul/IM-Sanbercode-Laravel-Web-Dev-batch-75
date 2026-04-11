@extends('layouts.app')

@section('title', 'Edit book')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Edit book: {{ $book->name }}</h4>

        <form action="{{ url('/book/' . $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="mb-3">
                <label class="form-label">book Name</label>
                <input type="text" class="form-control" name="name" value="{{ $book->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id" required>
                    <option disabled>--Select a Category--</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <div class="mb-2">
                    <img src="{{ asset('assets/images/products/' . $book->image) }}" alt="Current Image" style="max-height: 150px; border-radius: 8px;">
                    <p class="text-muted small mt-1">Gambar saat ini</p>
                </div>
                <input class="form-control" type="file" name="image">
                <small class="text-info">Biarkan kosong jika tidak ingin mengganti gambar.</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $book->price }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" value="{{ $book->stock }}" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="5" required>{{ $book->description }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ url('/book') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-primary rounded-pill px-4">Update book</button>
            </div>
        </form>
    </div>
</div>
@endsection
