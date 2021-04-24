@extends('layouts.admin')

@section('title', 'Edit Account Number')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Account Number</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('account-number.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Pemilik Rekening</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name') ?? $account->name }}" />
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="number">No Rekening</label>
                        <input type="number" name="number" id="number" value="{{ old('number') ?? $account->number }}"
                            class="form-control" />
                        @error('number')
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
                            @foreach ($payments as $payment)
                            <option value="{{ $payment->id }}"
                                {{ $payment->id == $account->payments_id ? 'selected' : '' }}>{{ $payment->name }}
                            </option>
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
                    <button type="submit" class="btn btn-primary">Edit Nomor Rekening</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
