@extends('layouts.admin')

@section('title', 'Details Transactions')

@section('content')
<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">#TK-{{ $transaction->code }}</h1>
    <p class="text-muted">Transactions Details</p>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-12">
                <h5 class="font-weight-bold">Informasi Transaksi</h5>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->transaction_details as $item)  
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp. {{ number_format($item->product_price) }}</td>
                        <td>{{ $item->amount }}</td>
                        <td style="font-weight: 600">Rp. {{ number_format($item->subtotal) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Nama Pelanggan</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->user->name }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Status Pengiriman</h6>
                @if ($transaction->shipping_status == 'PENDING' || $transaction->shipping_status == 'CANCEL')
                <div class="badge badge-danger" style="font-weight: 600">{{ $transaction->shipping_status }}</div>
                @endif
                @if ($transaction->shipping_status == 'DIPROSES')
                <div class="badge badge-warning" style="font-weight: 600">{{ $transaction->shipping_status }}</div>
                @endif
                @if ($transaction->shipping_status == 'DIKIRIM')
                <div class="badge badge-info" style="font-weight: 600">{{ $transaction->shipping_status }}</div>
                @endif
                @if ($transaction->shipping_status == 'SUCCESS')
                <div class="badge badge-success" style="font-weight: 600">{{ $transaction->shipping_status }}</div>
                @endif
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Status Transaksi</h6>
                @if ($transaction->transaction_status == 'UNPAID' || $transaction->transaction_status == 'PENDING')
                <p class="text-danger" style="font-weight: 600">{{ $transaction->transaction_status }}</p>
                @elseif ($transaction->transaction_status == 'PAID')
                <p class="text-success" style="font-weight: 600">{{ $transaction->transaction_status }}</p>
                @endif
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Total Belanja</h6>
                <p style="color: #FF6B3D; font-weight: bold">Rp. {{ number_format($transaction->total_price + $transaction->shipping_price) }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Tanggal Pembelian</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->created_at->format('d, F Y') }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h5 class="font-weight-bold">Informasi Pengiriman</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">No. Resi</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->resi ?? 'Tidak Ada' }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Alamat</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->user->address }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Mobile Phone</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->user->phone_number }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Provinsi</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->user->province->name }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Kota</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->user->regency->name }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Postal Code</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->user->postal_code }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Pembayaran</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->payment->name }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Kurir</h6>
                <p class="text-dark" style="font-weight: 600">{{ $transaction->courier->name }}</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Ongkir</h6>
                <p class="text-dark" style="font-weight: 600">Rp. {{ number_format($transaction->shipping_price) }}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h5 class="font-weight-bold">Status Pengiriman</h5>
            </div>
        </div>
        <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row" id="shipping_status">
                <div class="col-md-4">
                    <label for="shipping_status">Status</label>
                    <select name="shipping_status" id="shipping_status" class="form-control" v-model="status">
                        <option value="CANCEL">CANCEL</option>
                        <option value="PENDING">PENDING</option>
                        <option value="DIPROSES">DIPROSES</option>
                        <option value="DIKIRIM">DIKIRIM</option>
                        <option value="SUCCESS">SUCCESS</option>
                    </select>
                </div>
                <div class="col-md-4 mt-3 mt-lg-0" v-if="status == 'DIKIRIM'">
                    <div class="form-group">
                        <label for="resi">Input Resi</label>
                        <input type="text" name="resi" id="resi" v-model="resi" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center pt-3" v-if="status == 'DIKIRIM'">
                    <button type="submit" class="btn btn-success">Update Resi</button>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-right">
                    <button type="submit" name="save" class="btn btn-success px-4 py-2">Save Now</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('end-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    var status = new Vue({
        el: '#shipping_status',
        data: {
            status: '{{ $transaction->shipping_status }}',
            resi: '{{ $transaction->resi }}',
        },
    });

</script>

<script>
    Vue.use(Toasted);
    let self = this;

    @if(session()->has('success'))
    Vue.toasted.success(
        "{{ session()->get('success') }}", {
            position: 'top-center',
            className: "rounded",
            duration: 5000,
        }
    );
    @endif

</script>
@endpush
