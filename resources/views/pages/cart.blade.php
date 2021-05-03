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
                <div class="col-lg-8" v-if="products.length > 0">
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
                                            <form :action="product.urlSave" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="dropdown-item">Simpan Dulu</button>
                                            </form>
                                            <form :action="product.urlDelete" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" v-else>
                    <div class="alert alert-info text-center">
                        Belum Ada Barang Di Kerajangmu Yuk <strong><a href="{{ route('categories') }}" class="text-dark">Belanja Sekarang!</a></strong>
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
                                        <div class="heading-text">@{{ allCountProducts }} Barang</div>
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
                                        <div class="footer-text">Rp. @{{ new Intl.NumberFormat().format(grandTotal) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('cart-shipment') }}" method="POST" @submit.prevent="updateCart()">
                                <button type="submit" v-if="products.length > 0" id="btn-checkout" class="btn btn-success btn-block mt-4">Checkout Sekarang</button>
                                <button type="button" v-else disabled class="btn btn-success btn-block mt-4">Checkout Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cart-save" id="cart-save">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Barang Yang Disimpan</h2>
                    <p class="text-muted">Pindah Ke Keranjang dan Checkout</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @forelse ($saveProducts as $item)
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="{{ Storage::url($item->product->galleries->first()->photo) }}" class="img-product" alt="" />
                                </div>
                                <div class="col-md-5">
                                    <div class="title-text">{{ $item->product->name }}</div>
                                    <div class="subtitle-text">Rp. {{ number_format($item->product->price) }}<span class="category-text">,
                                            Stok {{ $item->product->stock }}</span></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="subtotal-text">{{ number_format($item->subtotal) }}</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="dropdown">
                                        <button class="btn btn-action dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Aksi</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <form action="{{ route('cart-move', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="dropdown-item">Pindahkan</button>
                                            </form>
                                            <form action="{{ route('cart-delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="alert alert-info">
                                Tidak Ada Produk Yang Disimpan    
                            </div>    
                        </div>    
                    </div>  
                    @endforelse
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
                @forelse ($productRandom  as $product)
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="{{ route('product', $product->slug) }}" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="
                            @if ($product->galleries->count() > 0)
                            background-image: url('{{ Storage::url($product->galleries->first()->photo) }}')
                            @else
                            background-color: #939393;
                            @endif
                            ">
                            </div>
                            <div
                                class="hover-product position-absolute d-flex justify-content-center align-items-center">
                                <div class="icon-wrapper">
                                    <img src="/images/ic_eye.svg" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-8">
                                <div class="category-name">{{ $product->category->name }}</div>
                                <div class="product-name">{{ Str::limit($product->name, 13) }}</div>
                                <div class="product-price">Rp. {{ number_format($product->price) }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="alert alert-info">
                                Produk Tidak Ditemukan
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

</div>
@endsection

@push('end-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var productCart = new Vue({
        el: '#product-cart',
        mounted() {
            AOS.init();
        },
        data() {
            return {
                products: [
                    @foreach ($carts as $item)   
                    {
                        id: {{ $item->id }},
                        url: '{{ Storage::url($item->product->galleries->first()->photo) }}',
                        name: '{{ $item->product->name }}',
                        price: {{ $item->product->price }},
                        stock: {{ $item->product->stock }},
                        count: {{ $item->amount }},
                        urlDelete: "cart/{{ $item->id }}",
                        urlSave: "cart/save/{{ $item->id }}",
                    },
                    @endforeach
                ],
            }
            
        },
        methods: {
            updateCart() {
                return [...this.products].forEach(p => {
                    axios.get('{{ route('cart-update') }}', {
                        params: {
                            id: p.id, 
                            amount: p.count, 
                            subtotal: p.count * p.price, 
                        }
                    })
                    .then(function (response) {
                        document.querySelector('#btn-checkout').innerHTML = 'Loading...';
                        document.location.href = '{{ route('cart-shipment') }}';
                    });
                });
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
        computed: {
            allCountProducts() {
                if (this.products.length) {
                    return this.products
                        .filter((product) => (product.count <= '' ? 0 : 1))
                        .reduce((acc, currentValue) => {
                            return acc + parseInt(currentValue.count);
                        }, 0);
                } else {
                    return 0;
                }
            },
            grandTotal() {
                if (this.products.length) {
                    return this.products.map((product) => product.price * product.count).reduce((acc,
                    currentValue) => acc + parseInt(currentValue));
                } else {
                    return 0;
                }
            },
        },
    });

</script>

<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted);

    @if(session()->has('success'))
    Vue.toasted.success(
        "{{ session()->get('success') }}", {
            position: 'top-center',
            className: "rounded",
            duration: 5000,
        }
    );
    @else
    Vue.toasted.error(
        "{{ session()->get('error') }}", {
            position: 'top-center',
            className: "rounded",
            duration: 5000,
        }
    );
    @endif

</script>

<script src="/script/card-payment-info.js"></script>
@endpush
