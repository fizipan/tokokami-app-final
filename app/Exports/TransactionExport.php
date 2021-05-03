<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class TransactionExport implements FromView, WithStyles, WithColumnWidths, ShouldAutoSize
{
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle(2)->getFont()->setBold(true);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,          
        ];
    }

    public function view(): View
    {
        $transactions = Transaction::with('user', 'payment', 'courier')->latest()->get(['id', 'code', 'users_id', 'payments_id', 'couriers_id', 'shipping_price', 'total_price', 'transaction_status', 'shipping_status', 'resi', 'created_at']);
            return view('export.transaction', compact('transactions'));
    }

}
