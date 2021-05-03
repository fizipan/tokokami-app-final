@extends('layouts.app')

@section('title', 'Katalog Barang Kebutuhan Rumah di TokoKami')

@section('content')
<div class="page-content page-products">
    <!-- Categories -->
    <section class="categories" id="categories">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>Cari Berdasarkan Kategori</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme">
                        @forelse ($categories as $category)
                        <a href="{{ route('categories-detail', $category->slug) }}" class="component-category">
                            <div class="img-wrapper">
                                <img src="{{ Storage::url($category->photo) }}" alt="" />
                            </div>
                            <div class="category-name">{{ $category->name }}</div>
                        </a>
                        @empty
                        <div class="alert alert-info">
                            Kategori Tidak Ditemukan
                        </div>
                        @endforelse
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
                    @isset($categoryDetail)
                    <h5>Kategori {{ $categoryDetail->name }}</h5>
                    @else
                    <h5>Semua Produk</h5>
                    @endisset
                </div>
            </div>
            <div class="row list-product">
                @php
                $animate = 0;
                @endphp
                @forelse ($products as $product)
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
                                <div class="product-name">{{ Str::limit($product->name , 13) }}</div>
                                <div class="product-price">Rp. {{ number_format($product->price) }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="alert alert-info text-center">
                                Produk Tidak Ditemukan
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            @if(!isset($categoryDetail))
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <button type="button" id="loadMore" class="btn btn-primary px-4 py-2"
                        style="background-color: #1A2854 !important" data-total-result="{{ $productCount ?? '' }}">Load
                        More Product</button>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection

{{-- Style --}}
@push('start-style')
<link rel="stylesheet" href="/vendor/owl-carousel/css/owl.carousel.min.css" />
<link rel="stylesheet" href="/vendor/owl-carousel/css/owl.theme.default.min.css" />
@endpush


{{-- Script --}}
@push('end-script')
<script src="/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="/script/owl-carousel.js"></script>

<script>
    $(function () {
        $('#loadMore').on('click', function () {
            let totalCurrentResult = $('.component-product').length;

            $.ajax({
                url: '{{ route('api-more-product') }}',
                type: 'get',
                dataType: 'json',
                data: {
                    skip: totalCurrentResult,
                },
                beforeSend: function () {
                    $('#loadMore').html('loading...');
                },
                success: function (response) {
                    $('#loadMore').html('Load More Product');
                    let html = ''
                    let animate = 800;
                    let formatNumber = new Intl.NumberFormat();
                    $.each(response, function(index, value) {
                        html += `<div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="${animate += 100}">
                                    <a href="/product/${value.slug}" class="component-product">
                                        <div class="thumbnail-image">
                                            <div class="product-image" style="background-image: url('storage/${value.galleries[0].photo}')">
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
                                                <div class="category-name">${value.category.name}</div>
                                                <div class="product-name">${value.name}</div>
                                                <div class="product-price">Rp. ${formatNumber.format(value.price)}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>`;
                    });

                    $('.list-product').append(html);

                    let totalCurrentResult = $('.component-product').length;
                    let totalResult = parseInt($('#loadMore').data('totalResult'));
                    
                    if (totalCurrentResult == totalResult) {
                        $('#loadMore').remove();
                    } else {
                        $('#loadMore').html('Load More Products');
                    }
                }
            });
        });
    });

</script>
@endpush
