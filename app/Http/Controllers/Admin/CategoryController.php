<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Category::query();

            return DataTables::of($query)
            ->addColumn('action', function($item) {
                return '<div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Aksi
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="'. route('category.edit', $item->id) .'">Edit</a>
                    <form action="'. route('category.destroy', $item->id) .'" method="POST">
                        '. csrf_field() .'
                        '. method_field('DELETE') .'
                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                    </form>
                </div>
            </div>';
            })
            ->editColumn('photo', function($item) {
                return $item->photo ? '<img src="'.  Storage::url($item->photo)  .'" style="max-height: 75px;" alt="">' : '';
            })
            ->rawColumns(['action', 'photo'])
            ->make();
        }
        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create');
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
            'name' => 'required|string|max:255',
            'photo' => 'required|image',
        ]);
        
        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/category', 'public');

        Category::create($data);
        return redirect()->route('category.index')
                            ->with('success', 'Kategori Berhasil Ditambahkan');
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
        $category = Category::findOrFail($id);
        return view('pages.admin.category.edit', [
            'category' => $category,
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
            'name' => 'required|string|max:255',
            'photo' => 'image',
        ]);

        $data['slug'] = Str::slug($request->name);
        
        if ($request->file('photo')) {
            $data['photo'] = $data['photo'] = $request->file('photo')->store('assets/category', 'public');
        } else {
            unset($data['photo']);
        }

        $item = Category::findOrFail($id);
        $item->update($data);

        return redirect()->route('category.index')
                            ->with('success', 'Kategori Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);

        $item->delete();
        return redirect()->route('category.index')
                            ->with('success', 'Kategori Berhasil Dihapus');
    }
}
