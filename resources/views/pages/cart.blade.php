@extends('layouts.app')

@section('title', 'Keranjang Barang Milikmu')

@section('content')
<div class="page-content page-cart">
    <!-- Cart -->
    <section class="cart-selected" id="cart-selected">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Keranjang Anda</h2>
                    <p class="text-muted">Cek Keranjangmu dan Siap Checkout</p>
                </div>
            </div>
            <div class="row" id="product-cart">
                <div class="col-lg-8">
                    <div class="card" v-for="(product, index) in products" :key="product.id">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img :src="product.url" class="img-product" alt="" />
                                </div>
                                <div class="col-md-4">
                                    <div class="title-text">@{{ product.name }}</div>
                                    <div class="subtitle-text">Rp.
                                        @{{ new Intl.NumberFormat().format(product.price) }}<span
                                            class="category-text">,
                                            Stok @{{ product.stock }}</span></div>
                                </div>
                                <div class="col-md-2 counting">
                                    <div class="d-flex">
                                        <button type="button" v-if="product.count > 1" @click="minusCounter(index)"
                                            class="btn-count minus-count">
                                            <img src="/images/ic_minus.svg" alt="" />
                                        </button>
                                        <button type="button" v-else disabled class="btn-count minus-count">
                                            <img src="/images/ic_minus.svg" alt="" />
                                        </button>
                                        <input type="number" @change="checkValidationCount(index, product.stock)"
                                            v-model="product.count" class="input-count" min="1" :max="product.stock" />
                                        <button type="button" v-if="product.count < product.stock"
                                            @click="addCounter(index)" class="btn-count plus-count">
                                            <img src="/images/ic_plus.svg" alt="" />
                                        </button>
                                        <button type="button" v-else disabled class="btn-count plus-count">
                                            <img src="/images/ic_plus.svg" alt="" />
                                        </button>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <p class="text-danger pl-1" style="font-size: 12px; font-weight: 500"
                                                v-if="product.count <= 0 ">Harus di isi</p>
                                            <p class="text-danger" style="font-size: 12px; font-weight: 500"
                                                v-if="product.count > product.stock">Max Stok (@{{ product.stock }})</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="subtotal-text">
                                        @{{ new Intl.NumberFormat().format(product.price * product.count) }}</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dropdown">
                                        <button class="btn btn-action dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Aksi</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Simpan Dulu</a>
                                            <a class="dropdown-item" href="#">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
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
                            <a href="checkout.html" disa class="btn btn-success btn-block mt-4">Checkout Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cart-save" id="cart-save">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Barang Yang Disimpan</h2>
                    <p class="text-muted">Pindah Ke Keranjang dan Checkout</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="/images/cart-1.jpg" class="img-product" alt="" />
                                </div>
                                <div class="col-md-5">
                                    <div class="title-text">Lifebuoy Bodywash</div>
                                    <div class="subtitle-text">Rp. 200.000<span class="category-text">,
                                            Kebersihan</span></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="subtotal-text">200.000</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dropdown">
                                        <button class="btn btn-action dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Aksi</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Pindahkan</a>
                                            <a class="dropdown-item" href="#">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="/images/cart-1.jpg" class="img-product" alt="" />
                                </div>
                                <div class="col-md-5">
                                    <div class="title-text">Lifebuoy Bodywash</div>
                                    <div class="subtitle-text">Rp. 200.000<span class="category-text">,
                                            Kebersihan</span></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="subtotal-text">200.000</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dropdown">
                                        <button class="btn btn-action dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Aksi</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Pindahkan</a>
                                            <a class="dropdown-item" href="#">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- New Products -->
    <section class="new-products mt-5" id="new-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 style="font-weight: 500; font-size: 24px">Rekomendasi Untukmu</h5>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="details.html" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="background-image: url('/images/product-1.jpg')"></div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">Dapur</div>
                                <div class="product-name">Minyak Bimoli</div>
                                <div class="product-price">Rp. 80.000</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="details.html" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="background-image: url('/images/product-2.jpg')"></div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">Kebersihan</div>
                                <div class="product-name">Sabun Mandi</div>
                                <div class="product-price">Rp. 200.000</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="details.html" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="background-image: url('/images/product-3.jpg')"></div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">Sepatu</div>
                                <div class="product-name">Sepatu Kulit Baja</div>
                                <div class="product-price">Rp. 500.000</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="details.html" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="background-image: url('/images/product-4.jpg')"></div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">Dapur</div>
                                <div class="product-name">Beras Coolent</div>
                                <div class="product-price">Rp. 350.000</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <a href="details.html" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="background-image: url('/images/product-5.jpg')"></div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">Kebersihan</div>
                                <div class="product-name">Pengharum Ruangan</div>
                                <div class="product-price">Rp. 300.000</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <a href="details.html" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="background-image: url('/images/product-6.jpg')"></div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">Kebersihan</div>
                                <div class="product-name">Sabun Muka Wanita</div>
                                <div class="product-price">Rp. 150.000</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="700">
                    <a href="details.html" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="background-image: url('/images/product-7.jpg')"></div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">Kebersihan</div>
                                <div class="product-name">Susu Botol</div>
                                <div class="product-price">Rp. 40.000</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                    <a href="details.html" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="background-image: url('/images/product-8.jpg')"></div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">Wanita</div>
                                <div class="product-name">Kosmetik Wanita</div>
                                <div class="product-price">Rp. 500.000</div>
                            </div>
                        </div>
                    </a>
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
            addCounter(index) {
                return this.products[index].count++;
            },
            minusCounter(index) {
                return this.products[index].count--;
            },
            checkValidationCount(index, stock) {
                if (this.products[index].count == '' || this.products[index].count == 0) {
                    return (this.products[index].count = 1);
                } else if (this.products[index].count > stock) {
                    return (this.products[index].count = stock);
                }
            },
        },
    });

</script>
<script src="/script/card-payment-info.js"></script>
@endpush
