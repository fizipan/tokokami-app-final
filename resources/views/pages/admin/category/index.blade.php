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
        <a href="dashboard-categories-create.html" class="btn btn-success">+ Tambah Kategori</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Foto</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Buku</td>
                        <td>
                            <img src="images/category-buku.png" style="max-height: 80px" alt="" />
                        </td>
                        <td>buku</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-categories-edit.html">
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
                        <td>Dapur</td>
                        <td>
                            <img src="images/category-dapur.png" style="max-height: 80px" alt="" />
                        </td>
                        <td>dapur</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-categories-edit.html">
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
                        <td>Makanan</td>
                        <td>
                            <img src="images/category-makanan.png" style="max-height: 80px" alt="" />
                        </td>
                        <td>makanan</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-categories-edit.html">
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
