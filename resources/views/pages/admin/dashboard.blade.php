@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="{{ route('export-transaction') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($customer) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Revenue</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($revenue) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-12 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transactions</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{ number_format($transaction) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-12">
        <h5 class="mb-0">Recent Transactions</h5>
    </div>
</div>

<div class="row mt-2">
    @forelse ($recents as $recent)
    <div class="col-12 mb-3">
        <a href="{{ route('transaction.edit', $recent->id) }}" class="card shadow-sm text-decoration-none">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-2 mb-lg-0">
                        <h5 class="mb-0 text-dark font-weight-bold">#TK-{{ $recent->code }}</h5>
                    </div>
                    <div class="col-md-3 mb-2 mb-lg-0">
                        <h5 class="mb-0 text-dark">{{ $recent->user->name }}</h5>
                    </div>
                    <div class="col-md-3 mb-2 mb-lg-0">
                        @if ($recent->shipping_status == 'PENDING' || $recent->shipping_status == 'CANCEL')
                        <div class="badge badge-danger">
                            {{ $recent->shipping_status }}
                        </div>
                        @elseif ($recent->shipping_status == 'DIPROSES')
                        <div class="badge badge-warning">
                            {{ $recent->shipping_status }}
                        </div>
                        @elseif ($recent->shipping_status == 'DIKIRIM')
                        <div class="badge badge-info">
                            {{ $recent->shipping_status }}
                        </div>
                        @else
                        <div class="badge badge-success">
                            {{ $recent->shipping_status }}
                        </div>
                        @endif
                    </div>
                    <div class="col-md-3 mb-2 mb-lg-0">
                        <h5 class="mb-0 text-dark">{{ $recent->created_at->format('d, F Y') }}</h5>
                    </div>
                    <div class="col-md-1 d-none d-md-block">
                        <img src="/images/icon-row.svg" alt="" />
                    </div>
                </div>
            </div>
        </a>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            Transaksi Tidak DiTemukan
        </div>
    </div>
    @endforelse
</div>
@endsection
