@extends('layouts.admin')

@section('title', 'All Transactions')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Transactions</h1>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Kurir</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Muhammad Toriq</td>
                        <td>Rp120.000</td>
                        <td>
                            <div class="badge badge-danger">Belum Konfirmasi</div>
                        </td>
                        <td>Gopay</td>
                        <td>COD</td>
                        <td>12, Januari 2021</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-product-detail.html">
                                        <i class="fas fa-eye text-secondary mr-2"></i>
                                        Detail
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
                        <td>Muhammad Mubarok</td>
                        <td>Rp220.000</td>
                        <td>
                            <div class="badge badge-info">Dikirim</div>
                        </td>
                        <td>Shoppe Pay</td>
                        <td>JNE</td>
                        <td>18, Maret 2021</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-product-detail.html">
                                        <i class="fas fa-eye text-secondary mr-2"></i>
                                        Detail
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
                        <td>Dendles Birama</td>
                        <td>Rp520.000</td>
                        <td>
                            <div class="badge badge-success">Tiba Di Tujuan</div>
                        </td>
                        <td>OVO</td>
                        <td>JNE</td>
                        <td>18, April 2021</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="dashboard-product-detail.html">
                                        <i class="fas fa-eye text-secondary mr-2"></i>
                                        Detail
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
