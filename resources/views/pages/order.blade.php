@extends('layouts.app')

@section('title', 'Daftar Belanja Kebutuhanmu')

@section('content')
<div class="page-content page-orders">
    <section class="order-list" id="order-list">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Daftar Belanja</h2>
                    <p class="text-muted">Belanja Terus sampai Puas</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all"
                                role="tab" aria-controls="pills-all" aria-selected="true">Semua</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-confirm-tab" data-toggle="pill" href="#pills-confirm"
                                role="tab" aria-controls="pills-confirm" aria-selected="false">Belum Konfirmasi</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-process-tab" data-toggle="pill" href="#pills-process"
                                role="tab" aria-controls="pills-process" aria-selected="false">Diproses</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-sent-tab" data-toggle="pill" href="#pills-sent" role="tab"
                                aria-controls="pills-sent" aria-selected="false">Dikirim</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-finish-tab" data-toggle="pill" href="#pills-finish" role="tab"
                                aria-controls="pills-finish" aria-selected="false">Tiba di Tujuan</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div class="card card-orders">
                                <div class="card-body">
                                    <div class="transaction-date">
                                        <p class="date-text">20 Januari 2021</p>
                                    </div>
                                    <div class="transaction-details">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Transaction Kode</div>
                                                <div class="subtitle-transaction">#JBL-09898</div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Status</div>
                                                <div class="subtitle-transaction">
                                                    <div class="badge badge-danger">Belum Konfirmasi</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="title-transaction">Total Belanja</div>
                                                <div class="price-transaction">Rp. 500.000</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="transaction-product">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2">
                                                <img src="/images/product-1.jpg" class="w-100" style="max-height: 100px"
                                                    alt="" />
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-name">Minyak Bimoli</div>
                                                <div class="product-count">Jumlah beli 1</div>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-3">
                                                <div class="title-transaction">Total Produk Price</div>
                                                <div class="subtitle-transaction">Rp. 500.000</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="transaction-footer mr-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-right">
                                                <button type="button" data-paymentid="" id="buttonDetail" class="btn"
                                                    data-toggle="modal" data-target="#detailModal">Lihat Detail
                                                    Transaksi</button>
                                                <button type="button" data-paymentid="" id="buttonOrder"
                                                    class="btn btn-dark ml-3 mt-2 mt-lg-0" data-toggle="modal"
                                                    data-target="#buyOrderModal">Bayar
                                                    Pesanan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-orders">
                                <div class="card-body">
                                    <div class="transaction-date">
                                        <p class="date-text">21 Maret 2021</p>
                                    </div>
                                    <div class="transaction-details">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Transaction Kode</div>
                                                <div class="subtitle-transaction">#JBL-09888</div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Status</div>
                                                <div class="subtitle-transaction">
                                                    <div class="badge badge-info">Dikirim</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="title-transaction">Total Belanja</div>
                                                <div class="price-transaction">Rp. 370.000</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="transaction-product">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2">
                                                <img src="/images/product-2.jpg" class="w-100" style="max-height: 100px"
                                                    alt="" />
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-name">Sabun Mandi Putih</div>
                                                <div class="product-count">Jumlah beli 1</div>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-3">
                                                <div class="title-transaction">Total Produk Price</div>
                                                <div class="subtitle-transaction">Rp. 400.000</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="transaction-footer mr-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-right">
                                                <button type="button" data-paymentid="" id="buttonDetail" class="btn"
                                                    data-toggle="modal" data-target="#detailModal">Lihat Detail
                                                    Transaksi</button>
                                                <button type="button" data-paymentid="" id="buttonOrder"
                                                    class="btn btn-dark ml-3 mt-2 mt-lg-0" data-toggle="modal"
                                                    data-target="#buyOrderModal">Bayar
                                                    Pesanan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-confirm" role="tabpanel"
                            aria-labelledby="pills-confirm-tab">
                            <h5 class="text-center">Transactions Not Found</h5>
                        </div>
                        <div class="tab-pane fade" id="pills-process" role="tabpanel"
                            aria-labelledby="pills-process-tab">
                            <h5 class="text-center">Transactions Not Found</h5>
                        </div>
                        <div class="tab-pane fade" id="pills-sent" role="tabpanel" aria-labelledby="pills-sent-tab">
                            <h5 class="text-center">Transactions Not Found</h5>
                        </div>
                        <div class="tab-pane fade" id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">
                            <h5 class="text-center">Transactions Not Found</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Payment-->
<div class="modal fade" id="buyOrderModal" tabindex="-1" aria-labelledby="buyOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buyOrderModalLabel">Konfirmasi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentConfirm">
                <div class="row">
                    <div class="col-md-12 mb-3 mb-lg-0">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-4">
                                        <img src="/images/payment-dana.png" class="w-100" alt="" />
                                    </div>
                                    <div class="col-8">
                                        <div class="text-muted">Jakob Botosh</div>
                                        <div class="rekening-number">098987899876</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Order Detail-->
<div class="modal modal-detail fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buyOrderModalLabel">Detail Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="paymentConfirm">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-between">
                            <div class="col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Invoice</div>
                                    <div class="subtitle-text">#TK-09098</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Status</div>
                                    <div class="subtitle-text">Transaksi berhasil</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Tanggal Transaksi</div>
                                    <div class="subtitle-text">11 Apr 2021 10:28 WIB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h5>Daftar Produk</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="/images/product-1.jpg" style="max-height: 75px" alt="" />
                                    </div>
                                    <div class="col-md-5" style="border-right: 1px solid rgb(224, 224, 224)">
                                        <div class="title-text">Minyak Bimoli</div>
                                        <div class="subtitle-text">Rp. 500.000<span class="text-muted"> x 2</span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="subtotal-text" style="color: rgb(255, 87, 34); font-weight: 500">Rp.
                                            600.000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="/images/product-1.jpg" style="max-height: 75px" alt="" />
                                    </div>
                                    <div class="col-md-5" style="border-right: 1px solid rgb(224, 224, 224)">
                                        <div class="title-text">Minyak Bimoli</div>
                                        <div class="subtitle-text">Rp. 500.000<span class="text-muted"> x 2</span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="subtotal-text" style="color: rgb(255, 87, 34); font-weight: 500">Rp.
                                            600.000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h5>Detail Pembelian</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Nama</div>
                                    <div class="subtitle-text">Angular Mayasashi</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Provinsi</div>
                                    <div class="subtitle-text">DKI Jakarta</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Kota</div>
                                    <div class="subtitle-text">Jakarta Barat</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Nomor Telephone</div>
                                    <div class="subtitle-text">0989 8765 4314</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Alamat</div>
                                    <div class="subtitle-text">Jl. H Sanusi Gang Hamzah No.21</div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="section-modal">
                                    <div class="title-text">Kode Pos</div>
                                    <div class="subtitle-text">11750</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h5>Informasi Pembelian</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-9">
                                        <div class="section-modal d-flex justify-content-between">
                                            <div class="title-text">Metode pembayaran</div>
                                            <div class="subtitle-text">Dana</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-9">
                                        <div class="section-modal d-flex justify-content-between">
                                            <div class="title-text">Subtotal</div>
                                            <div class="subtitle-text">Rp. 500.000</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-9">
                                        <div class="section-modal d-flex justify-content-between">
                                            <div class="title-text">Ongkir</div>
                                            <div class="subtitle-text">Rp. 16.000</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-9">
                                        <div class="section-modal d-flex justify-content-between">
                                            <div class="title-text">Total Pembayaran</div>
                                            <div class="subtitle-text"><span class="price">Rp. 516.000</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-4"></div>
        </div>
    </div>
</div>
@endsection
