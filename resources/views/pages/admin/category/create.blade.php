@extends('layouts.admin')

@section('title', 'Create Categories')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Categories</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-right">
                <button class="btn btn-primary">Tambah Kategori</button>
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
