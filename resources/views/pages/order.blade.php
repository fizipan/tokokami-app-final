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
                                role="tab" aria-controls="pills-confirm" aria-selected="false">Pending</a>
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
                                aria-controls="pills-finish" aria-selected="false">Success</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-cancel-tab" data-toggle="pill" href="#pills-cancel" role="tab"
                                aria-controls="pills-cancel" aria-selected="false">Cancel</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            @forelse ($orders as $order)
                            <div class="card card-orders">
                                <div class="card-body">
                                    <div class="transaction-date">
                                        <p class="date-text">{{ $order->created_at->format('d F Y') }}</p>
                                    </div>
                                    <div class="transaction-details">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Transaction Kode</div>
                                                <div class="subtitle-transaction">#TK-{{ $order->code }}</div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Status</div>
                                                <div class="subtitle-transaction">
                                                    @if ($order->shipping_status == 'PENDING' || $order->shipping_status == 'CANCEL')
                                                        <div class="badge badge-danger">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIPROSES')
                                                        <div class="badge badge-warning">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIKIRIM')
                                                        <div class="badge badge-info">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'SUCCESS')
                                                        <div class="badge badge-success">{{ $order->shipping_status }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="title-transaction">Total Belanja</div>
                                                <div class="price-transaction">Rp. {{ number_format($order->total_price + $order->shipping_price) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse ($order->transaction_details as $item)
                                    <div class="transaction-product">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2">
                                                <img src="{{ Storage::url($item->product->galleries->first()->photo) }}" class="w-100" style="max-height: 100px"
                                                    alt="" />
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-name">{{ $item->product->name }}</div>
                                                <div class="product-count">Jumlah beli {{ $item->amount }}</div>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-3">
                                                <div class="title-transaction">Total Produk Price</div>
                                                <div class="subtitle-transaction">Rp. {{ number_format($item->subtotal) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        
                                    @endforelse
                                    <div class="transaction-footer mr-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-right">
                                                <button type="button" id="buttonDetail" class="btn"
                                                    data-toggle="modal" data-detail-id="{{ $order->id }}" data-target="#detailModal">Lihat Detail
                                                    Transaksi</button>
                                                @if ($order->shipping_status == 'PENDING')
                                                    <button type="button" data-payment-id="{{ $order->payment->id }}" id="buttonPaid"
                                                    class="btn btn-dark ml-3 mt-2 mt-lg-0" data-toggle="modal"
                                                    data-target="#buyOrderModal">Bayar
                                                    Pesanan</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="alert alert-info text-center">
                                        Oops, nggak ada transaksi yang sesuai filter
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="tab-pane fade" id="pills-confirm" role="tabpanel"
                            aria-labelledby="pills-confirm-tab">
                            @forelse ($orders->where('shipping_status', 'PENDING') as $order)
                            <div class="card card-orders">
                                <div class="card-body">
                                    <div class="transaction-date">
                                        <p class="date-text">{{ $order->created_at->format('d F Y') }}</p>
                                    </div>
                                    <div class="transaction-details">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Transaction Kode</div>
                                                <div class="subtitle-transaction">#TK-{{ $order->code }}</div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Status</div>
                                                <div class="subtitle-transaction">
                                                    @if ($order->shipping_status == 'PENDING')
                                                        <div class="badge badge-danger">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIPROSES')
                                                        <div class="badge badge-warning">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIKIRIM')
                                                        <div class="badge badge-info">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'SUCCESS')
                                                        <div class="badge badge-success">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'CANCEL')
                                                        <div class="badge badge-dark">{{ $order->shipping_status }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="title-transaction">Total Belanja</div>
                                                <div class="price-transaction">Rp. {{ number_format($order->total_price + $order->shipping_price) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse ($order->transaction_details as $item)
                                    <div class="transaction-product">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2">
                                                <img src="{{ Storage::url($item->product->galleries->first()->photo) }}" class="w-100" style="max-height: 100px"
                                                    alt="" />
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-name">{{ $item->product->name }}</div>
                                                <div class="product-count">Jumlah beli {{ $item->amount }}</div>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-3">
                                                <div class="title-transaction">Total Produk Price</div>
                                                <div class="subtitle-transaction">Rp. {{ number_format($item->subtotal) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        
                                    @endforelse
                                    <div class="transaction-footer mr-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-right">
                                                <button type="button" data-detail-id="{{ $order->id }}" id="buttonDetail" class="btn"
                                                    data-toggle="modal" data-target="#detailModal">Lihat Detail
                                                    Transaksi</button>
                                                <button type="button" data-payment-id="{{ $order->payment->id }}" id="buttonPaid"
                                                    class="btn btn-dark ml-3 mt-2 mt-lg-0" data-toggle="modal"
                                                    data-target="#buyOrderModal">Bayar
                                                    Pesanan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="alert alert-info text-center">
                                        Oops, nggak ada transaksi yang sesuai filter
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="tab-pane fade" id="pills-process" role="tabpanel"
                            aria-labelledby="pills-process-tab">
                            @forelse ($orders->where('shipping_status', 'DIPROSES') as $order)
                            <div class="card card-orders">
                                <div class="card-body">
                                    <div class="transaction-date">
                                        <p class="date-text">{{ $order->created_at->format('d F Y') }}</p>
                                    </div>
                                    <div class="transaction-details">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Transaction Kode</div>
                                                <div class="subtitle-transaction">#TK-{{ $order->code }}</div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Status</div>
                                                <div class="subtitle-transaction">
                                                    @if ($order->shipping_status == 'PENDING')
                                                    <div class="badge badge-danger">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIPROSES')
                                                        <div class="badge badge-warning">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIKIRIM')
                                                        <div class="badge badge-info">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'SUCCESS')
                                                        <div class="badge badge-success">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'CANCEL')
                                                        <div class="badge badge-dark">{{ $order->shipping_status }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="title-transaction">Total Belanja</div>
                                                <div class="price-transaction">Rp. {{ number_format($order->total_price + $order->shipping_price) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse ($order->transaction_details as $item)
                                    <div class="transaction-product">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2">
                                                <img src="{{ Storage::url($item->product->galleries->first()->photo) }}" class="w-100" style="max-height: 100px"
                                                    alt="" />
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-name">{{ $item->product->name }}</div>
                                                <div class="product-count">Jumlah beli {{ $item->amount }}</div>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-3">
                                                <div class="title-transaction">Total Produk Price</div>
                                                <div class="subtitle-transaction">Rp. {{ number_format($item->subtotal) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        
                                    @endforelse
                                    <div class="transaction-footer mr-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-right">
                                                <button type="button" data-detail-id="{{ $order->id }}" id="buttonDetail" class="btn"
                                                    data-toggle="modal" data-target="#detailModal">Lihat Detail
                                                    Transaksi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="alert alert-info text-center">
                                        Oops, nggak ada transaksi yang sesuai filter
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="tab-pane fade" id="pills-sent" role="tabpanel" aria-labelledby="pills-sent-tab">
                            @forelse ($orders->where('shipping_status', 'DIKIRIM') as $order)
                            <div class="card card-orders">
                                <div class="card-body">
                                    <div class="transaction-date">
                                        <p class="date-text">{{ $order->created_at->format('d F Y') }}</p>
                                    </div>
                                    <div class="transaction-details">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Transaction Kode</div>
                                                <div class="subtitle-transaction">#TK-{{ $order->code }}</div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Status</div>
                                                <div class="subtitle-transaction">
                                                    @if ($order->shipping_status == 'PENDING')
                                                        <div class="badge badge-danger">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIPROSES')
                                                        <div class="badge badge-warning">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIKIRIM')
                                                        <div class="badge badge-info">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'SUCCESS')
                                                        <div class="badge badge-success">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'CANCEL')
                                                        <div class="badge badge-dark">{{ $order->shipping_status }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="title-transaction">Total Belanja</div>
                                                <div class="price-transaction">Rp. {{ number_format($order->total_price + $order->shipping_price) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse ($order->transaction_details as $item)
                                    <div class="transaction-product">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2">
                                                <img src="{{ Storage::url($item->product->galleries->first()->photo) }}" class="w-100" style="max-height: 100px"
                                                    alt="" />
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-name">{{ $item->product->name }}</div>
                                                <div class="product-count">Jumlah beli {{ $item->amount }}</div>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-3">
                                                <div class="title-transaction">Total Produk Price</div>
                                                <div class="subtitle-transaction">Rp. {{ number_format($item->subtotal) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        
                                    @endforelse
                                    <div class="transaction-footer mr-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-right">
                                                <button type="button" data-detail-id="{{ $order->id }}" id="buttonDetail" class="btn"
                                                    data-toggle="modal" data-target="#detailModal">Lihat Detail
                                                    Transaksi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="alert alert-info text-center">
                                        Oops, nggak ada transaksi yang sesuai filter
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="tab-pane fade" id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">
                            @forelse ($orders->where('shipping_status', 'SUCCESS') as $order)
                            <div class="card card-orders">
                                <div class="card-body">
                                    <div class="transaction-date">
                                        <p class="date-text">{{ $order->created_at->format('d F Y') }}</p>
                                    </div>
                                    <div class="transaction-details">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Transaction Kode</div>
                                                <div class="subtitle-transaction">#TK-{{ $order->code }}</div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Status</div>
                                                <div class="subtitle-transaction">
                                                    @if ($order->shipping_status == 'PENDING')
                                                        <div class="badge badge-danger">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIPROSES')
                                                        <div class="badge badge-warning">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIKIRIM')
                                                        <div class="badge badge-info">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'SUCCESS')
                                                        <div class="badge badge-success">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'CANCEL')
                                                        <div class="badge badge-dark">{{ $order->shipping_status }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="title-transaction">Total Belanja</div>
                                                <div class="price-transaction">Rp. {{ number_format($order->total_price + $order->shipping_price) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse ($order->transaction_details as $item)
                                    <div class="transaction-product">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2">
                                                <img src="{{ Storage::url($item->product->galleries->first()->photo) }}" class="w-100" style="max-height: 100px"
                                                    alt="" />
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-name">{{ $item->product->name }}</div>
                                                <div class="product-count">Jumlah beli {{ $item->amount }}</div>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-3">
                                                <div class="title-transaction">Total Produk Price</div>
                                                <div class="subtitle-transaction">Rp. {{ number_format($item->subtotal) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        
                                    @endforelse
                                    <div class="transaction-footer mr-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-right">
                                                <button type="button" data-detail-id="{{ $order->id }}" id="buttonDetail" class="btn"
                                                    data-toggle="modal" data-target="#detailModal">Lihat Detail
                                                    Transaksi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="alert alert-info text-center">
                                        Oops, nggak ada transaksi yang sesuai filter
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab">
                            @forelse ($orders->where('shipping_status', 'CANCEL') as $order)
                            <div class="card card-orders">
                                <div class="card-body">
                                    <div class="transaction-date">
                                        <p class="date-text">{{ $order->created_at->format('d F Y') }}</p>
                                    </div>
                                    <div class="transaction-details">
                                        <div class="row">
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Transaction Kode</div>
                                                <div class="subtitle-transaction">#TK-{{ $order->code }}</div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="title-transaction">Status</div>
                                                <div class="subtitle-transaction">
                                                    @if ($order->shipping_status == 'PENDING' || $order->shipping_status == 'CANCEL')
                                                        <div class="badge badge-danger">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIPROSES')
                                                        <div class="badge badge-warning">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'DIKIRIM')
                                                        <div class="badge badge-info">{{ $order->shipping_status }}</div>
                                                    @endif
                                                    @if ($order->shipping_status == 'SUCCESS')
                                                        <div class="badge badge-success">{{ $order->shipping_status }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="title-transaction">Total Belanja</div>
                                                <div class="price-transaction">Rp. {{ number_format($order->total_price + $order->shipping_price) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse ($order->transaction_details as $item)
                                    <div class="transaction-product">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-md-2">
                                                <img src="{{ Storage::url($item->product->galleries->first()->photo) }}" class="w-100" style="max-height: 100px"
                                                    alt="" />
                                            </div>
                                            <div class="col-8 col-md-4">
                                                <div class="product-name">{{ $item->product->name }}</div>
                                                <div class="product-count">Jumlah beli {{ $item->amount }}</div>
                                            </div>
                                            <div class="col-md-4 mt-2 mb-3">
                                                <div class="title-transaction">Total Produk Price</div>
                                                <div class="subtitle-transaction">Rp. {{ number_format($item->subtotal) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        
                                    @endforelse
                                    <div class="transaction-footer mr-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-right">
                                                <button type="button" data-detail-id="{{ $order->id }}" id="buttonDetail" class="btn"
                                                    data-toggle="modal" data-target="#detailModal">Lihat Detail
                                                    Transaksi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="alert alert-info text-center">
                                        Oops, nggak ada transaksi yang sesuai filter
                                    </div>
                                </div>
                            </div>
                            @endforelse
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
            <div class="modal-body" id="paymentConfirm"></div>
            <div class="modal-footer" id="btnPaymentConfirm">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=6281285417293&text=Halo,%20Saya%20sudah%20melakukan%20pembayaran%20dengan%20no%20invoice%20INVOICE_PESANAN_KAMU.%20Nama%20Saya%20adalah%20NAMA_KAMU.%20Berikut%20saya%20lampirkan%20foto%20bukti%20pembayaran:" class="btn btn-success">Konfirmasi</a>
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
            <div class="modal-body" id="detailTransaction"></div>
            <div class="modal-footer py-4"></div>
        </div>
    </div>
</div>
@endsection

@push('end-script')
<script>
    $(function() {
        const buttonPaid = document.querySelectorAll('#buttonPaid');
    
        buttonPaid.forEach(function(btn) {
            btn.addEventListener('click', function() {
                $('#paymentConfirm').empty();
                const dataId = this.dataset.paymentId;
                
                $.ajax({
                    type: "get",
                    url: "{{ route('api-get-payment') }}",
                    dataType: "json",
                    data: {
                        id: dataId,
                    },
                    beforeSend: function() {
                        $('#paymentConfirm').append('<p class="text-center">Sedang Memuat...</p>');
                    },
                    success: function (response) {
                        $('#paymentConfirm').empty();
                        let html = '';
                        
                        if (response.length) {
                            $.each(response, function (index, value) { 
                                html += `<div class="row">
                                            <div class="col-md-12 mb-3>
                                                <div class="card mb-0">
                                                    <div class="card-body">
                                                        <div class="row align-items-center justify-content-between">
                                                            <div class="col-4">
                                                                <img src="storage/${value.payment.photo}" class="w-100" alt="" />
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="text-muted">${value.name}</div>
                                                                <div class="rekening-number">${value.number}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

                            });
                        } else {
                            html += '<p class="text-center">Tidak ada nomer rekening dengan pembayaran ini!</p>';
                        }
                        
                        $('#paymentConfirm').append(html);
                    }
                });
            })
        });
    });
</script>

<script>
     $(function() {
        const buttonDetail = document.querySelectorAll('#buttonDetail');
    
        buttonDetail.forEach(function(btn) {
            btn.addEventListener('click', function() {
                $('#detailTransaction').empty();
                let formatNumber = new Intl.NumberFormat();
                const detailId = this.dataset.detailId;
                
                $.ajax({
                    type: "get",
                    url: "{{ route('api-get-detail') }}",
                    dataType: "json",
                    data: {
                        id: detailId,
                    },
                    beforeSend: function() {
                        $('#detailTransaction').append('<p class="text-center">Sedang Memuat...</p>');
                    },
                    success: function (response) {
                        $('#detailTransaction').empty();
                        let html = '';
                        
                        if (response.length) {
                            $.each(response, function (index, value) { 
                                let date = new Date(value.created_at);
                                html += `<div class="row">
                                            <div class="col-12">
                                                <div class="row justify-content-between">
                                                    <div class="col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Invoice</div>
                                                            <div class="subtitle-text">#TK-${value.code}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Status Pengiriman</div>
                                                            <div class="subtitle-text">${value.shipping_status}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Status Transaksi</div>
                                                            <div class="subtitle-text">${value.transaction_status}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Tanggal Transaksi</div>
                                                            <div class="subtitle-text">${date.toDateString()}</div>
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
                                                <div class="row">`;
                                                    $.each(value.transaction_details, function (index, data) { 
                                                       html += `<div class="col-12 mb-4">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-2">
                                                                            <img src="storage/${data.product.galleries[0].photo}" style="max-height: 75px" alt="" />
                                                                        </div>
                                                                        <div class="col-md-5" style="border-right: 1px solid rgb(224, 224, 224)">
                                                                            <div class="title-text">${data.product.name}</div>
                                                                            <div class="subtitle-text">Rp. ${formatNumber.format(data.product_price)}<span class="text-muted"> x ${data.amount}</span></div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="subtotal-text" style="color: rgb(255, 87, 34); font-weight: 500">Rp. ${formatNumber.format(data.subtotal)}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>`;
                                                    });
                                        html += `</div>
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
                                                            <div class="subtitle-text">${value.user.name}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Provinsi</div>
                                                            <div class="subtitle-text">${value.user.province.name}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Kota</div>
                                                            <div class="subtitle-text">${value.user.regency.name}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Nomor Telephone</div>
                                                            <div class="subtitle-text">${value.user.phone_number}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Alamat</div>
                                                            <div class="subtitle-text">${value.user.address}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="section-modal">
                                                            <div class="title-text">Kode Pos</div>
                                                            <div class="subtitle-text">${value.user.postal_code}</div>
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
                                                                    <div class="subtitle-text">${value.payment.name}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-9">
                                                                <div class="section-modal d-flex justify-content-between">
                                                                    <div class="title-text">Subtotal</div>
                                                                    <div class="subtitle-text">Rp. ${formatNumber.format(value.total_price)}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-9">
                                                                <div class="section-modal d-flex justify-content-between">
                                                                    <div class="title-text">Ongkir</div>
                                                                    <div class="subtitle-text">Rp. ${formatNumber.format(value.shipping_price)}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-9">
                                                                <div class="section-modal d-flex justify-content-between">
                                                                    <div class="title-text">Total Pembayaran</div>
                                                                    <div class="subtitle-text"><span class="price">Rp. ${formatNumber.format(value.total_price + value.shipping_price)}</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

                            });
                        } else {
                            html += '<p class="text-center">Tidak ada nomer rekening dengan pembayaran ini!</p>';
                        }
                        
                        $('#detailTransaction').append(html);
                    }
                });
            })
        });
    });
</script>
@endpush