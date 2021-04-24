@extends('layouts.admin')

@section('title', 'All Categories')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Categories</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="{{ route('category.create') }}" class="btn btn-success">+ Tambah Kategori</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="crudTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Foto</th>
                        <th>Slug</th>
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
            url: '{!! url()->current() !!}'
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
                name: 'photo',
                orderable: false,
                searcable: false,
            },
            {
                data: 'slug',
                name: 'slug'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searcable: false,
                width: '15%',
            },
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
