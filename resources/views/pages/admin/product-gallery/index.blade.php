@extends('layouts.admin')

@section('title', 'Products Galleries ')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product Galleries</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="{{ route('product-gallery.create') }}" class="btn btn-success">+ Tambah Gallery</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="crudTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
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
            url: '{!! url()->current() !!}'
        },
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'product.name',
                name: 'product.name'
            },
            {
                data: 'photo',
                name: 'photo',
                orderable: false,
                searcable: false,
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
