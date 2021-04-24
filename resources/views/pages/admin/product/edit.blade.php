@extends('layouts.admin')

@section('title', 'Edit Products')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $product->name }}</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" id="name" value="{{ old('name') ?? $product->name }}"
                            class="form-control bg-light small" />
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="price">Harga Produk</label>
                        <input type="number" name="price" id="price" value="{{ old('price') ?? $product->price }}"
                            class="form-control bg-light small" />
                        @error('price')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="categories_id">Kategori</label>
                        <select name="categories_id" id="categories_id" class="form-control bg-light small">
                            @foreach ($categories as $category)
                            <option {{ $category->id === $product->categories_id ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-group">
                        <label for="stock">Stok Produk</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock') ?? $product->stock }}"
                            class="form-control bg-light small" />
                        @error('stock')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="form-group">
                        <label for="description">Deskripsi Produk</label>
                        <textarea name="description"
                            id="description">{{ old('description') ?? $product->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary">Update Produk</button>
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
