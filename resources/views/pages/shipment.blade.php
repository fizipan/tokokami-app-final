@extends('layouts.app')

@section('title', 'Checkout Barangmu')

@section('content')
<div class="page-content page-cart">
    <!-- Cart -->
    <section class="cart-selected" id="cart-selected">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Checkout</h2>
                    <p class="text-muted">Checkout Barangmu dan Siap Bayar</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h5 class="my-3" style="font-size: 18px">Detail Pengiriman</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" value="Setra Duta Cemara" class="form-control" name="address"
                                    id="address" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinces_id">Provinsi</label>
                                <select name="provinces_id" class="form-control" id="provinces_id">
                                    <option value="DKI Jakarta">DKI Jakarta</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Jawab Tengah">Jawab Tengah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="regencies_id">Kota</label>
                                <select name="regencies_id" class="form-control" id="regencies_id">
                                    <option value="Jakarta Barat">Jakarta Barat</option>
                                    <option value="Garut">Garut</option>
                                    <option value="Purbolinggo">Purbolinggo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="postal_code">Kode Pos</label>
                                <input type="number" value="123999" class="form-control" name="postal_code"
                                    id="postal_code" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payments_id">Jenis Pembayaran</label>
                                <select name="payments_id" class="form-control" id="payments_id">
                                    <option value="Dana">Dana</option>
                                    <option value="OVO">OVO</option>
                                    <option value="Gopay">Gopay</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">No Telepon</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                    value="+628 2020 11111" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cart-save" id="cart-save">
        <div class="container">
            <div class="row" id="product-cart">
                <div class="col-lg-8">
                    <h5 class="my-3" style="font-size: 18px">Pesanan Kamu</h5>
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
                                    <div class="heading-text">Jumlah Barang</div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="heading-text">@{{ allCountProducts() }} Barang</div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="footer-info">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <div class="footer-text">Total Harga</div>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <div class="footer-text">Rp. @{{ new Intl.NumberFormat().format(grandTotal()) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="payment.html" disa class="btn btn-success btn-block mt-4">Pesan Sekarang</a>
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
        methods: {
            allCountProducts() {
                return this.products
                    .filter((product) => (product.count <= '' ? 0 : 1))
                    .reduce((acc, currentValue) => {
                        return acc + parseInt(currentValue.count);
                    }, 0);
            },
            grandTotal() {
                return this.products.map((product) => product.price * product.count).reduce((acc,
                    currentValue) => acc + parseInt(currentValue));
            },
        },
    });

</script>
<script src="/script/card-payment-info.js"></script>
@endpush
