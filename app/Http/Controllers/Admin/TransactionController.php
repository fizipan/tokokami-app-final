<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $query = Transaction::latest()->with(['user', 'payment']);

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    return '<div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'. route('transaction.edit', $item->id) .'">Edit</a>
                                <form action="'. route('transaction.destroy', $item->id) .'" method="POST">
                                    '. csrf_field() .'
                                    '. method_field('DELETE') .'
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                            </div>
                        </div>';
                })
                ->editColumn('code', function($item) {
                    return '#TK-' . $item->code;
                })
                ->editColumn('shipping_status', function($item) {
                    if ($item->shipping_status == 'PENDING' || $item->shipping_status == 'CANCEL') {
                        $alert = '<div class="badge badge-danger">
                                    '. $item->shipping_status . '
                                </div>';
                    } elseif ($item->shipping_status == 'DIPROSES') {
                        $alert = '<div class="badge badge-warning">
                                    '. $item->shipping_status . '
                                </div>';
                    } elseif ($item->shipping_status == 'DIKIRIM') {
                        $alert = '<div class="badge badge-info">
                                    '. $item->shipping_status . '
                                </div>';
                    } elseif ($item->shipping_status == 'SUCCESS') {
                        $alert = '<div class="badge badge-success">
                                    '. $item->shipping_status . '
                                </div>';
                    }

                    return $alert;
                })
                ->editColumn('total_price', function($item) {
                    return 'Rp. ' . number_format($item->total_price + $item->shipping_price);
                })
                ->editColumn('created_at', function($item) {
                    return $item->created_at->format('d, F Y');
                })
                ->rawColumns(['code','action', 'shipping_status'])
                ->make();
        }
        return view('pages.admin.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::with(['transaction_details.product.galleries', 'user.regency', 'user.province', 'courier'])
                                    ->where('id', $id)->firstOrFail();
        return view('pages.admin.transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Transaction::findOrFail($id);

        if ($request->shipping_status == 'CANCEL') {
            $item->update([
                'shipping_status' => $request->shipping_status,
                'transaction_status' => 'UNPAID',
            ]);
        } elseif ($request->shipping_status == 'PENDING') {
            $item->update([
                'shipping_status' => $request->shipping_status,
                'transaction_status' => 'PENDING',
            ]);
        } elseif ($request->shipping_status == 'DIKIRIM') {
            $item->update([
                'shipping_status' => $request->shipping_status,
                'transaction_status' => 'PAID',
                'resi' => $request->resi,
            ]);
        } else {
            $item->update([
                'shipping_status' => $request->shipping_status,
                'transaction_status' => 'PAID',
            ]);
        }


        return redirect()->back()
                            ->with('success', 'Transaksi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);

        $item->delete();

        return redirect()->route('transaction.index')
                            ->with('success', 'Transaksi Berhasil Dihapus');
    }
}
