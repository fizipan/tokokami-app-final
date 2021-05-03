@extends('layouts.app')

@section('title', 'Jual '. $product->name)

@section('content')
<div class="page-content page-details">
    <!-- Breadcrumbs -->
    <section class="breadcrumbs" id="breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('categories') }}">Home</a></li>
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
                        <h1>{{  $product->name }}</h1>
                        <div class="category">{{  $product->category->name }}</div>
                        <div class="price">Rp. {{ number_format($product->price) }}</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        @auth
                        <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-block px-4 py-2">+ Keranjang</button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-success btn-block px-4 py-2">+ Keranjang</a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        {!! $product->description !!}
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
                @php
                $animate = 0;
                @endphp
                @forelse ($productsRelated as $item)
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $animate += 100 }}">
                    <a href="{{ route('product', $item->slug) }}" class="component-product">
                        <div class="thumbnail-image">
                            <div class="product-image" style="
                            @if ($item->galleries->count() > 0)
                            background-image: url('{{ Storage::url($item->galleries->first()->photo) }}')
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
                                <div class="category-name">{{ $item->category->name }}</div>
                                <div class="product-name">{{ Str::limit($item->name, 13) }}</div>
                                <div class="product-price">Rp. {{ number_format($item->price) }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-12">
                    <div class="row justify-content-center mt-2">
                        <div class="col-md-6">
                            <div class="alert alert-info text-center">
                                Tidak Ada Produk Yang Terkait Dengan Kategori <strong>{{ $product->category->name }}</strong>
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
<script>
    var gallery = new Vue({
        el: '#gallery',
        mounted() {
            AOS.init();
        },
        data: {
            activePhoto: 0,
            photos: [
                @foreach($product->galleries as $item) 
                {
                    id: {{ $item->id }},
                    url: '{{ Storage::url($item->photo) }}',
                },
                @endforeach
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
