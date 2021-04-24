<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountNumberRequest;
use App\Models\AccountNumber;
use App\Models\Payment;
use Yajra\DataTables\Facades\DataTables;

class AccountNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = AccountNumber::with('payment');

            return DataTables::of($query)
            ->addColumn('action', function($item) {
                return '<div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'. route('account-number.edit', $item->id) .'">Edit</a>
                                <form action="'. route('account-number.destroy', $item->id) .'" method="POST">
                                    '. csrf_field() .'
                                    '. method_field('DELETE') .'
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                            </div>
                        </div>';
                
            })
            ->rawColumns(['action'])
            ->make();
            
        }
        return view('pages.admin.account-number.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payments = Payment::all();
        return view('pages.admin.account-number.create', [
            'payments' => $payments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountNumberRequest $request)
    {
        $data = $request->all();

        AccountNumber::create($data);

        return redirect()->route('account-number.index')
                            ->with('success', 'Nomor Rekening Berhasil Ditambahkan');
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
        $payments = Payment::all();
        $account = AccountNumber::findOrFail($id);
        return view('pages.admin.account-number.edit', [
            'payments' => $payments,
            'account' => $account,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountNumberRequest $request, $id)
    {
        $data = $request->all();

        $item = AccountNumber::findOrFail($id);

        $item->update($data);

        return redirect()->route('account-number.index')
                            ->with('success', 'Nomor Rekening Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = AccountNumber::findOrFail($id);

        $item->delete();
        
        return redirect()->route('account-number.index')
                            ->with('success', 'Nomor Rekening Berhasil Dihapus');
    }
}
