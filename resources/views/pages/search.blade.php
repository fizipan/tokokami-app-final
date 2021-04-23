@extends('layouts.app')

@section('title', 'Cari Kebutuhan Rumah Yang Pas di TokoKami')

@section('content')
<div class="page-content page-search">
    <!-- Hero -->
    <section class="hero-search" id="hero-search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1>Pencarian Produk</h1>
                    <p class="text-muted">Carilah produk yang kamu inginkan untuk memenuhi kebutuhan dirumah kamu</p>
                    <div class="form-group">
                        <img src="/images/ic_search-form.svg" alt="" />
                        <input type="search" name="search" id="search" placeholder="Cari Kebutuhan Apa Hari Ini ?"
                            class="form-control search-control" />
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
                    <h5 style="font-weight: 600; font-size: 24px">Hasil (12) Produk</h5>
                </div>
            </div>
            <div class="row mt-4">
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
