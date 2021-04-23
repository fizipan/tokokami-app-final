@extends('layouts.admin')

@section('title', 'All Account Number')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Account Number</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    @if (session()->has('success'))
    <div class="flash-message" data-flashdata="{{ session()->get('success') }}"></div>
    @endif
    <div class="card-header">
        <a href="{{ route('account-number.create') }}" class="btn btn-success">+ Tambah Nomor Rekening</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="crudTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemilik Rekening</th>
                        <th>No Rekening</th>
                        <th>Jenis Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'number_rekening',
                name: 'number_rekening'
            },
            {
                data: 'payment.name',
                name: 'payment.name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '15%',
            }
        ]
    });

</script>
@endpush
