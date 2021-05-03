<html>
    <h2>Laporan Transaksi Tokokami.com</h2>
    <table>
        <thead style="font-weight: bold">
        <tr>
            <th>No</th>
            <th>Invoice</th>
            <th>Nama Pelanggan</th>
            <th>Pembayaran</th>
            <th>Kurir</th>
            <th>Ongkir</th>
            <th>Total Harga</th>
            <th>Grand Total</th>
            <th>Status Pengiriman</th>
            <th>Status Transaksi</th>
            <th>Resi</th>
            <th>Tanggal Transaksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->code }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->payment->name }}</td>
                <td>{{ $transaction->courier->name }}</td>
                <td>{{ $transaction->shipping_price }}</td>
                <td>{{ $transaction->total_price }}</td>
                <td>{{ $transaction->total_price + $transaction->shipping_price }}</td>
                <td style="background-color: rgb(0, 255, 0);">{{ $transaction->shipping_status }}</td>
                <td>{{ $transaction->transaction_status }}</td>
                <td>{{ $transaction->resi }}</td>
                <td>{{ $transaction->created_at->format('d, F Y H:i:s') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</html>