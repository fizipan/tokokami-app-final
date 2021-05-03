@extends('layouts.app')

@section('title', 'Tokokami')

@section('content')
<div class="page-content page-home">
    <!-- Hero -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Cari Kebutuhan Rumah Yang Pas</h1>
                    <p class="description-hero">Kami memberikan solusi buat kamu untuk mencari kebutuhan rumah yang pas
                        tanpa perlu ribet</p>
                    <a href="{{ route('categories') }}" class="btn btn-primary px-4 py-2"> Cari Sekarang </a>
                </div>
                <div class="col-md-6 hero-image d-none d-lg-block">
                    <img src="/images/hero-ilustration.png" class="w-100" alt="" />
                </div>
            </div>
        </div>
    </section>

    <!-- Benefit -->
    <section class="benefit" id="benefit">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Mengapa Harus di TokoKami.com ?</h2>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-md-5 card-benefit" data-aos="fade-up" data-aos-delay="100">
                    <img src="/images/benefit-1.svg" alt="" />
                    <div class="body-benefit">
                        <div class="title-benefit">Harga Resmi Barang</div>
                        <div class="subtitle-benefit">Harga yang ditampilkan adalah harga barang yang sesuai dengan
                            harga jual produk secara resmi</div>
                    </div>
                </div>
                <div class="col-md-5 card-benefit" data-aos="fade-up" data-aos-delay="200">
                    <img src="/images/benefit-2.svg" alt="" />
                    <div class="body-benefit">
                        <div class="title-benefit">Garansi Uang Kembali</div>
                        <div class="subtitle-benefit">Pelanggan yang membeli barang di toko kami mendapatkan jaminan
                            uang kembali jika barang tidak sesuai dengan pemesanan awal</div>
                    </div>
                </div>
                <div class="col-md-5 card-benefit" data-aos="fade-up" data-aos-delay="300">
                    <img src="/images/benefit-3.svg" alt="" />
                    <div class="body-benefit">
                        <div class="title-benefit">Costumize</div>
                        <div class="subtitle-benefit">Kamu bisa memilih barang apa aja yang kamuperlukan untuk memenuhi
                            dan melengkapi kebutuhan rumah</div>
                    </div>
                </div>
                <div class="col-md-5 card-benefit" data-aos="fade-up" data-aos-delay="400">
                    <img src="/images/benefit-4.svg" alt="" />
                    <div class="body-benefit">
                        <div class="title-benefit">Diskon %</div>
                        <div class="subtitle-benefit">Ditoko kami selalu memberikan event diskon kepada kamu yang ingin
                            mencari barang kebutuhan rumah</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Products -->
    <section class="new-products" id="new-products">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Barang Terbaru</h2>
                    <p class="text-muted">Nikmati berbelanja kebutuhan rumah dengan barang-barang terbaru yang tersedia
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                @php
                $animate = 0;
                @endphp
                @forelse ($newProducts as $product)
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $animate += 100 }}">
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
                                <div class="product-name">{{ Str::limit($product->name , 13)}}</div>
                                <div class="product-price">Rp. {{ number_format($product->price) }}</div>
                            </div>
                            <div class="col-2 offset-1">
                                <div class="badge badge-success">Baru</div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-md-6">
                    <div class="alert alert-info text-center">
                        Produk Tidak Ditemukan
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Order Procedure -->
    <section class="order-procedure" id="order-procedure">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Cara Pemesanan</h2>
                </div>
            </div>
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-11 col-md-4 card-order" data-aos="fade-down">
                    <img src="/images/order-1.svg" alt="order-1" />
                    <div class="title-order">Kunjungi website kami</div>
                    <div class="subtitle-order">Kamu bisa mengunjungi website marketplace di TokoKami.com</div>
                </div>
                <div class="col-11 col-md-4 card-order" data-aos="fade-down" data-aos-delay="500">
                    <img src="/images/order-2.svg" alt="order-2" />
                    <div class="title-order">Cari Kebutuhan Rumah</div>
                    <div class="subtitle-order">Cari yang kamu inginkan untuk memenuhi kebutuhan di rumah kamu</div>
                </div>
                <div class="col-11 col-md-4 card-order" data-aos="fade-down" data-aos-delay="1000">
                    <img src="/images/order-3.svg" alt="order-3" />
                    <div class="title-order">Selesaikan Pembayaran</div>
                    <div class="subtitle-order">Kamu bisa melanjutkan dengan menyelesaikan pembayaran untuk barang
                        kebutuhan yang kamu inginkan</div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
