<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductGallery::with('product');

            return DataTables::of($query)
            ->addColumn('action', function($item) {
                return '<div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="'. route('product-gallery.edit', $item->id) .'">Edit</a>
                                <form action="'. route('product-gallery.destroy', $item->id) .'" method="POST">
                                    '. csrf_field() .'
                                    '. method_field('DELETE') .'
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                            </div>
                        </div>';
                
            })
            ->editColumn('photo', function($item) {
                return $item->photo ? '<img src="'. Storage::url($item->photo) .'" style="max-height:75px;" alt="">' : '';
            })
            ->rawColumns(['action', 'photo'])
            ->make();
            
        }
        return view('pages.admin.product-gallery.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.admin.product-gallery.create', [
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'products_id' => 'required|exists:products,id',
            'photo' => 'required|image',
        ]);

        $data['photo'] = $request->file('photo')->store('assets/product-gallery', 'public');

        ProductGallery::create($data);
        return redirect()->route('product-gallery.index')
                            ->with('success', 'Gallery Berhasil Ditambahkan');
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
        $products = Product::all();
        $gallery = ProductGallery::findOrFail($id);
        return view('pages.admin.product-gallery.edit', [
            'products' => $products,
            'gallery' => $gallery,
        ]);
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
        $data = $request->validate([
            'products_id' => 'required|exists:products,id',
            'photo' => 'image',
        ]);

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('assets/product-gallery', 'public');
        } else {
            unset($data['photo']);
        }

        $item = ProductGallery::findOrFail($id);
        $item->update($data);

        return redirect()->route('product-gallery.index')
                            ->with('success', 'Gallery Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);

        $item->delete();

        return redirect()->route('product-gallery.index')
                            ->with('success', 'Gallery Berhasil Dihapus');
    }
}
