@extends('layouts.app')

@section('title', 'Tambah book')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h4 class="mb-4">Tambah book</h4>

        <form action="{{ url('/book') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">book Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id" required>
                    <option selected disabled>--Select a Category--</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="image" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4">Submit</button>
        </form>
    </div>
</div>
@endsection
