@extends('layouts.admin')

@section('title', 'All Payments')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Payments</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    @if (session()->has('success'))
    <div class="flash-message" data-flashdata="{{ session()->get('success') }}"></div>
    @endif
    <div class="card-header">
        <a href="{{ route('payment.create') }}" class="btn btn-success">+ Tambah Jenis Pembayaran</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="crudTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembayaran</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('end-script')
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
                data: 'photo',
                name: 'photo'
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
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted);
    let self = this;

    @if(session()->has('success'))
    Vue.toasted.success(
        "{{ session()->get('success') }}", {
            position: 'top-center',
            className: "rounded",
            duration: 5000,
        }
    );
    @endif

</script>
@endpush
