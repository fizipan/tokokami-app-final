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
                        <div class="col-md-6">
                            <div class="card card-payment">
                                <div class="card-body">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-4">
                                            <img src="/images/payment-dana.png" class="w-100" alt="" />
                                        </div>
                                        <div class="col-8">
                                            <div class="owner">Jakob Botosh</div>
                                            <div class="number">098987899876</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-payment">
                                <div class="card-body">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-4">
                                            <img src="/images/payment-ovo.png" class="w-100" alt="" />
                                        </div>
                                        <div class="col-8">
                                            <div class="owner">Masayashi</div>
                                            <div class="number">098987899876</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="my-3" style="font-size: 18px">Alamat Pengiriman</h5>
                    <hr />
                    <div class="shipping-detail">
                        <div class="customer-name">Midun Van Jok</div>
                        <div class="phone-number">098987876567</div>
                        <div class="address two">Jl. H. Sanusi, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus
                            Ibukota Jakarta</div>
                        <div class="address one">Cengkareng, Jakarta Barat, 11750</div>
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
                    <div class="card" v-for="(product, index) in products" :key="product.id">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img :src="product.url" class="img-product" alt="" />
                                </div>
                                <div class="col-md-5">
                                    <div class="title-text">@{{ product.name }}</div>
                                    <div class="subtitle-text">Rp.
                                        @{{ new Intl.NumberFormat().format(product.price) }}<span
                                            class="category-text">,
                                            Stok @{{ product.stock }}</span></div>
                                </div>
                                <div class="col-md-2 counting">
                                    <input type="number" readonly v-model="product.count" class="input-count" />
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <p class="text-danger pl-1" style="font-size: 12px; font-weight: 500"
                                                v-if="product.count <= 0 ">Harus di isi</p>
                                            <p class="text-danger" style="font-size: 12px; font-weight: 500"
                                                v-if="product.count > product.stock">Max Stok (@{{ product.stock }})</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="subtotal-text">Rp.
                                        @{{ new Intl.NumberFormat().format(product.price * product.count) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="heading-text">Rp. 340,000</div>
                                </div>
                            </div>
                            <div class="row justify-content-between mt-2">
                                <div class="col-6">
                                    <div class="heading-text">Ongkos Kirim</div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="heading-text">Rp. 10,000</div>
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
                                    <div class="footer-text">Rp. 350,000</div>
                                </div>
                            </div>
                        </div>
                        <a href="checkout.html" disa class="btn btn-success btn-block mt-4">Konfirmasi Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('end-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    var productCart = new Vue({
        el: '#product-cart',
        mounted() {
            AOS.init();
        },
        data: {
            products: [{
                    id: 1,
                    url: '/images/product-1.jpg',
                    name: 'Lifebuoy Bodywash',
                    price: 200000,
                    stock: 10,
                    count: 1,
                },
                {
                    id: 2,
                    url: '/images/product-2.jpg',
                    name: 'Beras Coolent',
                    price: 350000,
                    stock: 60,
                    count: 1,
                },
                {
                    id: 3,
                    url: '/images/product-3.jpg',
                    name: 'Susu Botol',
                    price: 40000,
                    stock: 100,
                    count: 1,
                },
            ],
        },
    });

</script>
<script src="/script/card-payment-info.js"></script>
@endpush
