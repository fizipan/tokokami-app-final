@extends('layouts.app')

@section('title', 'Checkout Barangmu')

@section('content')
<div class="page-content page-cart">
    <form action="{{ route('checkout') }}" method="post">
        @csrf
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
                                    <input type="text" value="{{ old('address') ?? $user->address }}" class="form-control" name="address"
                                        id="address" />
                                    @error('address')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinces_id">Provinsi</label>
                                    <select name="provinces_id" class="form-control" id="provinces_id">
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" {{ $province->id == $user->provinces_id ? 'selected' : '' }}>{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('provinces_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="regencies_id">Kota</label>
                                    <select name="regencies_id" class="form-control" id="regencies_id">
                                        @isset($user->regencies_id)
                                            <option value="{{ $user->regencies_id }}">{{ $user->regency->name }}</option>
                                        @endisset
                                    </select>
                                    @error('regencies_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postal_code">Kode Pos</label>
                                    <input type="number" value="{{ old('postal_code') ?? $user->postal_code  }}" class="form-control" name="postal_code"
                                        id="postal_code" />
                                    @error('postal_code')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="couriers_id">Kurir</label>
                                    <select name="couriers_id" class="form-control" id="couriers_id">
                                        @foreach ($couriers as $courier)
                                            <option value="{{ $courier->code }}">{{ $courier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('couriers_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payments_id">Jenis Pembayaran</label>
                                    <select name="payments_id" class="form-control" id="payments_id">
                                        @foreach ($payments as $payment)
                                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('payments_id')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">No Telepon</label>
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ old('phone_number') ?? $user->phone_number }}" />
                                    @error('phone_number')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
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
                                <input type="hidden" name="total_price" :value="grandTotal">
                                <input type="hidden" name="amount" :value="allCountProducts">
                                <button type="submit"  class="btn btn-success btn-block mt-4">Pesan Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
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
        },
        computed: {
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

<script>
    $(function() {
        $('select[id="provinces_id"]').change(function () { 
            let value = $(this).val();
            // let currentRegency = {{ $user->regencies_id }};
            if (value) {
                $.ajax({
                    type: "get",
                    url: "/api/regency/" + value,
                    dataType: "json",
                    success: function (response) {
                        let html = '';
    
                        $.each(response, function (index, value) { 
                            $('select[id="regencies_id"]').empty();
                            html += `<option value="${value.city_id}">${value.name}</option>`
                             $('select[id="regencies_id"]').append(html);
                        });
                    }
                });
            } else {
                $('select[id="regencies_id"]').empty();
            }
        });
    });
</script>


<script src="/script/card-payment-info.js"></script>
@endpush
