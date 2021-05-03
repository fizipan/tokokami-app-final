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
                    <form action="{{ route('search') }}" method="GET">
                        <div class="form-group input-group">
                            <input type="keyword" name="keyword" required minlength="2" value="{{ request('keyword') ?? '' }}" style="border-radius: 16px 0 0 16px !important" id="search" placeholder="Cari Kebutuhan Apa ?"
                                class="form-control search-control" />
                            <div class="input-group-append">
                                <select name="category" class="custom-select border-0 position-relative z2" style="height: 100%; padding: 0 20px; border-radius: 0 16px 16px 0; border-left: 1px solid #eee !important" id="inputGroupSelect01">
                                    <option selected value="">Semua</option>
                                    @foreach ($categories as $item)
                                        <option {{ $item->slug === request('category') ? 'selected' : '' }} value="{{ $item->slug }}">{{ $item->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- New Products -->
    @isset($products)
    <section class="new-products mt-5" id="new-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <h5 style="font-weight: 600; font-size: 24px">Hasil ({{ $products->count() }}) Produk</h5>
                </div>
            </div>
            <div class="row mt-4">
                @forelse ($products as $item)
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
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
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <div class="alert alert-info">
                                Produk dengan keyword <strong>{{ request('keyword') }}</strong> tidak ditemukan
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    @endisset
</div>
@endsection

