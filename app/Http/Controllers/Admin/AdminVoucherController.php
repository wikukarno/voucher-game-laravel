<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Nominal;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Voucher::query();
            return datatables()->of($query)
                ->addIndexColumn()
                ->editColumn('action', function ($item) {
                    return '
                        <div class="d-flex">
                            <a href="' . route('voucher.edit', $item->id) . '" class="btn btn-sm btn-info mx-1">
                                <i class="fas fa-pencil"></i>
                            </a>


                            <button id="btnDelete" class="btn btn-sm btn-danger mx-1" onclick="btnDeleteVoucher(' . $item->id . ')"><i class="fas fa-trash"></i></button>
                        </div>

                        
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.voucher.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $nominals = Nominal::all();
        return view('pages.admin.voucher.create', compact('categories', 'nominals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail')->store('assets/voucher', 'public');
        }
        $data = Voucher::create([
            'name' => $request->name,
            'users_id' => Auth::user()->id,
            'categories_id' => $request->categories_id,
            'nominals_id' => $request->nominals_id,
            'thumbnail' => $thumbnail ?? null,
        ]);

        if ($data) {
            toast('Data berhasil ditambahkan', 'success');
            return redirect()->route('voucher.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            toast('Data gagal ditambahkan', 'error');
            return redirect()->route('voucher.index')->with('error', 'Data gagal ditambahkan');
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
        $voucher = Voucher::findOrFail($id);
        $categories = Category::all();
        $nominals = Nominal::all();
        return view('pages.admin.voucher.edit', compact('voucher', 'categories', 'nominals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Voucher::findOrFail($id);
        if($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail')->store('assets/voucher', 'public');
        }else{
            $thumbnail = $data->thumbnail;
        }
        $data->update([
            'name' => $request->name,
            'users_id' => Auth::user()->id,
            'categories_id' => $request->categories_id,
            'nominals_id' => $request->nominals_id,
            'thumbnail' => $thumbnail,
        ]);

        if ($data) {
            toast('Data berhasil diupdate', 'success');
            return redirect()->route('voucher.index')->with('success', 'Data berhasil diupdate');
        } else {
            toast('Data gagal diupdate', 'error');
            return redirect()->route('voucher.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Voucher::findOrFail($request->id);
        $data->delete();

        if($data->trashed()){
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal dihapus'
            ]);
        }
    }
}
