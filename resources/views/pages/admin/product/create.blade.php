@extends('layouts.admin')

@section('title', 'Create Products')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Products</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" name="name" id="name" class="form-control bg-light small" />
                </div>
            </div>
            <div class="col-xl-6">
                <div class="form-group">
                    <label for="price">Harga Produk</label>
                    <input type="number" name="price" id="price" class="form-control bg-light small" />
                </div>
            </div>
            <div class="col-xl-12">
                <div class="form-group">
                    <label for="categories_id">Kategori</label>
                    <select name="categories_id" id="categories_id" class="form-control bg-light small">
                        <option value="Buku Bisnis" selected>Buku Bisnis</option>
                        <option value="Olahraga">Ayam Bakar</option>
                        <option value="Makanan Ringan">Makanan Ringan</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="form-group">
                    <label for="description">Deskripsi Produk</label>
                    <textarea name="description" id="description"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-right">
                <button class="btn btn-primary">Tambah Produk</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('end-script')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

</script>
@endpush
