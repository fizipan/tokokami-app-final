@extends('layouts.admin')

@section('title', 'Edit Product Gallery')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <form action="{{ route('product-gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="products_id">Nama Produk</label>
                        <select name="products_id" id="products_id" class="form-control">
                            @foreach ($products as $product)
                            <option {{ $product->id === $gallery->products_id ? 'selected' : '' }}
                                value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('products_id')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" />
                        @error('photo')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary">Edit Gallery</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('end-script')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

</script>
@endpush
