@extends('layouts.admin')

@section('title', 'All Products')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Products</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="dashboard-product-create.html" class="btn btn-success">+ Tambah Produk</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Description</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Buku Startup $100</td>
                        <td>Buku Bisnis</td>
                        <td>Rp120.000</td>
                        <td>20</td>
                        <td>The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for
                            unimaginable, all-day comfort. There's</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-product-detail.html">
                                        <i class="fas fa-edit text-secondary mr-2"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-trash-alt text-secondary mr-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pulpen Pelangi</td>
                        <td>Peralatan Sekolah</td>
                        <td>Rp320.000</td>
                        <td>100</td>
                        <td>The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for
                            unimaginable, all-day comfort. There's</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-product-detail.html">
                                        <i class="fas fa-edit text-secondary mr-2"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-trash-alt text-secondary mr-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ayam Geprek</td>
                        <td>Makanan</td>
                        <td>Rp50.000</td>
                        <td>10</td>
                        <td>The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for
                            unimaginable, all-day comfort. There's</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-product-detail.html">
                                        <i class="fas fa-edit text-secondary mr-2"></i>
                                        Edit
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-trash-alt text-secondary mr-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
