<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nominal;
use Illuminate\Http\Request;

class AdminNominalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Nominal::query();
            return datatables()->of($query)
                ->addIndexColumn()
                ->editColumn('price', function($item){
                    return 'Rp.' . number_format($item->price, 0, ',', '.');
                })
                ->editColumn('action', function ($item) {
                    return '
                        <div class="d-flex">
                            <a href="' . route('nominal.edit', $item->id) . '" class="btn btn-sm btn-info mx-1">
                                <i class="fas fa-pencil"></i>
                            </a>


                            <button id="btnDelete" class="btn btn-sm btn-danger mx-1" onclick="btnDeleteNominal(' . $item->id . ')"><i class="fas fa-trash"></i></button>
                        </div>

                        
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.nominal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.nominal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Nominal::create([
            'coinName' => $request->coinName,
            'coinQuantity' => $request->coinQuantity,
            'price' => $request->price,
        ]);

        if ($data->save()) {
            toast('Data berhasil ditambahkan', 'success');
            return redirect()->route('nominal.index');
        } else {
            toast('Data gagal ditambahkan', 'error');
            return redirect()->route('nominal.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Nominal::findOrFail($id);
        return view('pages.admin.nominal.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Nominal::findOrFail($id);
        $data->update([
            'coinName' => $request->coinName,
            'coinQuantity' => $request->coinQuantity,
            'price' => $request->price,
        ]);

        if($data->save()){
            toast('Data berhasil diupdate', 'success');
            return redirect()->route('nominal.index');
        }else{
            toast('Data gagal diupdate', 'error');
            return redirect()->route('nominal.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Nominal::findOrFail($request->id);
        $data->delete();

        if ($data->trashed()) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal dihapus'
            ]);
        }
    }
}
