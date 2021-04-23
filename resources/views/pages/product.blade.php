@extends('layouts.app')

@section('title', 'Jual Sabun Mandi Putih')

@section('content')
<div class="page-content page-details">
    <!-- Breadcrumbs -->
    <section class="breadcrumbs" id="breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="gallery-active w-100"
                            alt="" />
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" data-aos="zoom-in" data-aos-delay="100"
                            v-for="(photo, index) in photos" :key="photo.id">
                            <a href="#" @click="changeActive(index)">
                                <img :src="photo.url" class="gallery-img w-100"
                                    :class="{ active: index == activePhoto }" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- details Product-->
    <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>Sabun Mandi Putih</h1>
                        <div class="category">Kebersihan</div>
                        <div class="price">Rp. 200.000</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        <a href="cart.html" class="btn btn-success btn-block px-4 py-2">+ Keranjang</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="description-text">
                            The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for
                            unimaginable, all-day comfort. There's super breathable fabrics on the upper, while colours
                            add a modern edge.
                        </p>
                        <p class="description-text">
                            Bring the past into the future with the Nike Air Max 2090, a bold look inspired by the DNA
                            of the iconic Air Max 90. Brand-new Nike Air cushioning underfoot adds unparalleled comfort
                            while transparent mesh and vibrantly
                            coloured details on the upper are blended with timeless OG features for an edgy, modernised
                            look.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- New Products -->
    <section class="new-products mt-5" id="new-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 style="font-weight: 500; font-size: 24px">Produk Terkait</h5>
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
    var gallery = new Vue({
        el: '#gallery',
        mounted() {
            AOS.init();
        },
        data: {
            activePhoto: 0,
            photos: [{
                    id: 1,
                    url: '/images/product-1.jpg',
                },
                {
                    id: 2,
                    url: '/images/product-2.jpg',
                },
                {
                    id: 3,
                    url: '/images/product-3.jpg',
                },
                {
                    id: 4,
                    url: '/images/product-4.jpg',
                },
            ],
        },
        methods: {
            changeActive(id) {
                this.activePhoto = id;
            },
        },
    });

</script>
@endpush
