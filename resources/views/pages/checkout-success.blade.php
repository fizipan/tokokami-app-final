@extends('layouts.app')

@section('title', 'Bayar Pesananmu Disini')

@section('content')
<div class="page-content page-payment">
    <!-- Payment Detail -->
    <section class="payment-detail" id="payment-detail">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Bayar Pesanan</h2>
                    <p class="text-muted">Bayar dan Konfirmasi Pesananmu</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h5 class="my-3" style="font-size: 18px">Kirim Ke Rekening Ini</h5>
                    <hr />
                    <div class="row">
                        @forelse ($accounts as $account)
                        <div class="col-md-6">
                            <div class="card card-payment">
                                <div class="card-body">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-4">
                                            <img src="{{ Storage::url($account->payment->photo) }}" class="w-100" alt="" />
                                        </div>
                                        <div class="col-8">
                                            <div class="owner">{{ $account->name }}</div>
                                            <div class="number">{{ $account->number }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            
                        @endforelse
                    </div>
                    <h5 class="my-3" style="font-size: 18px">Alamat Pengiriman</h5>
                    <hr />
                    <div class="shipping-detail">
                        <div class="customer-name">{{ $transaction->user->name }}</div>
                        <div class="phone-number">{{ $transaction->user->phone_number }}</div>
                        <div class="address two">{{ $transaction->user->address }}</div>
                        <div class="address one">{{ $transaction->user->regency->name }} {{ $transaction->user->province->name }}, {{ $transaction->user->postal_code }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Item Order -->
    <section class="cart-save" id="cart-save">
        <div class="container">
            <div class="row" id="product-cart">
                <div class="col-lg-8">
                    <h5 class="mt-4 mb-3" style="font-size: 18px">Pesanan Kamu</h5>
                    <hr />
                    @forelse ($transaction->transaction_details as $detail)
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="{{ Storage::url($detail->product->galleries->first()->photo) }}" class="img-product" alt="" />
                                </div>
                                <div class="col-md-5">
                                    <div class="title-text">{{ $detail->product->name }}</div>
                                    <div class="subtitle-text">Rp.
                                        {{ number_format($detail->product_price)}}<span
                                            class="category-text">,
                                            Stok {{ $detail->product->stock }}</span></div>
                                </div>
                                <div class="col-md-2 counting">
                                    <input type="number" readonly value="{{ $detail->amount }}" class="input-count" />
                                </div>
                                <div class="col-md-3">
                                    <div class="subtotal-text">Rp.
                                        {{ number_format($detail->subtotal) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                </div>
                <div class="card payment-info">
                    <div class="card-body">
                        <div class="heading-info">
                            <h5>Ringkasan Belanja</h5>
                            <div class="row justify-content-between mt-4">
                                <div class="col-6">
                                    <div class="heading-text">Total Harga</div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="heading-text">Rp. {{ number_format($transaction->total_price) }}</div>
                                </div>
                            </div>
                            <div class="row justify-content-between mt-2">
                                <div class="col-6">
                                    <div class="heading-text">Ongkos Kirim</div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="heading-text">Rp. {{ number_format($transaction->shipping_price) }}</div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="footer-info">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <div class="footer-text">Grand Total</div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="footer-text">Rp. {{ number_format($transaction->total_price + $transaction->shipping_price) }}</div>
                                </div>
                            </div>
                        </div>
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=6281285417293&text=Halo,%20Saya%20sudah%20melakukan%20pembayaran%20dengan%20no%20invoice%20{{ $transaction->code }}.%20Nama%20Saya%20adalah%20{{ $transaction->user->name }}.%20Berikut%20saya%20lampirkan%20foto%20bukti%20pembayaran:" class="btn btn-success btn-block mt-4">Konfirmasi Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('end-script')
<script src="/script/card-payment-info.js"></script>
@endpush
