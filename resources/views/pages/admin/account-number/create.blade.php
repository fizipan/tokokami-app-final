@extends('layouts.admin')

@section('title')
    Create Rekening Number | Jubeliness
@endsection 

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Rekening Number</h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="{{ route('rekening-number.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="name">Pemilik Rekening</label>
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
              <label for="number_rekening">No Rekening</label>
              <input type="number" name="number_rekening" id="number_rekening" class="form-control" />
              @error('number_rekening')
                  <span class="text-danger">
                    {{ $message }}
                  </span>
              @enderror
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="payments_id">Jenis Pembayaran</label>
              <select name="payments_id" id="payments_id" class="form-control">
                <option selected disabled>-- Pilih Pembayaran --</option>
                @foreach ($payments as $payment)
                  <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                @endforeach
                @error('payments_id')
                    <span class="text-danger">
                      {{ $message }}
                    </span>
                @enderror
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-right">
            <button type="submit" class="btn btn-primary">Tambah Nomor Rekening</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection