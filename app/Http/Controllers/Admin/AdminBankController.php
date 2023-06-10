<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Bank::query();
            return datatables()->of($query)
                ->addIndexColumn()
                ->editColumn('created_at', function ($item) {
                    return $item->created_at->isoFormat('dddd, D MMMM Y');
                })
                ->editColumn('action', function ($item) {
                    return '
                        <div class="d-flex">
                            <a href="' . route('bank.edit', $item->id) . '" class="btn btn-sm btn-info mx-1">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <button id="btnDelete" class="btn btn-sm btn-danger mx-1" onclick="btnDeleteBank(' . $item->id . ')"><i class="fas fa-trash"></i></button>
                        </div>
                    ';
                })

                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }
        return view('pages.admin.bank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankRequest $request)
    {
        $data = Bank::create([
            'name' => $request->name,
            'users_id' => Auth::user()->id,
            'norek' => $request->norek,
            'bankname' => $request->bankname,
        ]);

        if($data->save()){
            toast('Data bank berhasil ditambahkan', 'success');
            return redirect()->route('bank.index');
        }else{
            toast('Data bank gagal ditambahkan', 'error');
            return redirect()->route('bank.index');
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
        $bank = Bank::findOrFail($id);
        return view('pages.admin.bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankRequest $request, string $id)
    {
        $data = Bank::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'users_id' => Auth::user()->id,
            'norek' => $request->norek,
            'bankname' => $request->bankname,
        ]);

        if($data->update()){
            toast('Data bank berhasil diubah', 'success');
            return redirect()->route('bank.index');
        }else{
            toast('Data bank gagal diubah', 'error');
            return redirect()->route('bank.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Bank::findOrFail($request->id);
        $data->delete();

        if($data->trashed()){
            response()->json([
                'status' => 'success',
                'message' => 'Data bank berhasil dihapus'
            ]);
        }else{
            response()->json([
                'status' => 'error',
                'message' => 'Data bank gagal dihapus'
            ]);
        }
    }
}
