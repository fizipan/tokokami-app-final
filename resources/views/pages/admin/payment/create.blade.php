@extends('layouts.admin')

@section('title', 'Create Payment')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Payment</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Nama Pembayaran</label>
                        <input type="text" name="name" id="name" class="form-control" />
                        @error('name')
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
                    <button class="btn btn-primary">Tambah Jenis Pembayaran</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
