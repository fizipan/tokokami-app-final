@extends('layouts.admin')

@section('title', 'Details Transactions')

@section('content')
<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">#JBL-08986</h1>
    <p class="text-muted">Transactions Details</p>
</div>

<!-- Content Row -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-12">
                <h5 class="font-weight-bold">Transactions Information</h5>
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
                    <tr>
                        <td>1</td>
                        <td>Buku Startup $100</td>
                        <td>Rp120.000</td>
                        <td>2</td>
                        <td>Rp240.000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pulpen Pelangi</td>
                        <td>Rp20.000</td>
                        <td>2</td>
                        <td>Rp40.000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Penggrais Unique</td>
                        <td>Rp10.000</td>
                        <td>3</td>
                        <td>Rp30.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-4">
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Customer Name</h6>
                <p class="text-dark" style="font-weight: 600">Mujahidin Wahid</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Payment Status</h6>
                <p class="text-dark" style="font-weight: 600">Diproses</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Total Belanja</h6>
                <p class="text-dark" style="font-weight: 600">Rp320.000</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Tanggal Pembelian</h6>
                <p class="text-dark" style="font-weight: 600">12, Maret 2021</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h5 class="font-weight-bold">Shipping Information</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Alamat</h6>
                <p class="text-dark" style="font-weight: 600">Setra Dua Cemara</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Mobile Phone</h6>
                <p class="text-dark" style="font-weight: 600">098987656543</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Provinsi</h6>
                <p class="text-dark" style="font-weight: 600">Jakarta</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Kota</h6>
                <p class="text-dark" style="font-weight: 600">DKI Jakarta</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Postal Code</h6>
                <p class="text-dark" style="font-weight: 600">1175</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Pembayaran</h6>
                <p class="text-dark" style="font-weight: 600">Gopay</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Kurir</h6>
                <p class="text-dark" style="font-weight: 600">JNE</p>
            </div>
            <div class="col-md-3">
                <h6 class="mb-0 text-gray-500">Ongkir</h6>
                <p class="text-dark" style="font-weight: 600">Rp5.000</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <h5 class="font-weight-bold">Shipping Status</h5>
            </div>
        </div>
        <div class="row" id="shipping_status">
            <div class="col-md-4">
                <label for="resi">Status</label>
                <select name="status" id="status" class="form-control" v-model="status">
                    <option value="CANCEL">CANCEL</option>
                    <option value="PENDING">PENDING</option>
                    <option value="DIPROSES">DIPROSES</option>
                    <option value="DIKIRIM">DIKIRIM</option>
                    <option value="TELAH TIBA">SUCCESS</option>
                </select>
            </div>
            <div class="col-md-4 mt-3 mt-lg-0" v-if="status == 'DIKIRIM'">
                <div class="form-group">
                    <label for="resi">Input Resi</label>
                    <input type="text" name="resi" id="resi" class="form-control" />
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
    </div>
</div>
@endsection

@push('end-script')
<script src="/vendor/vue/vue.js"></script>
<script>
    var status = new Vue({
        el: '#shipping_status',
        data: {
            status: 'PENDING',
            resi: '098987876543213',
        },
    });

</script>
@endpush
