<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Bank;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Payment::query();
            return datatables()->of($query)
                ->addIndexColumn()
                ->editColumn('created_at', function ($item) {
                    return $item->created_at->isoFormat('dddd, D MMMM Y');
                })
                ->editColumn('action', function ($item) {
                    return '
                        <div class="d-flex">
                            <a href="' . route('payment.edit', $item->id) . '" class="btn btn-sm btn-info mx-1">
                                <i class="fas fa-pencil"></i>
                            </a>


                            <button id="btnDelete" class="btn btn-sm btn-danger mx-1" onclick="btnDeletePayment(' . $item->id . ')"><i class="fas fa-trash"></i></button>
                        </div>

                        
                    ';
                })

                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }
        return view('pages.admin.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bank = Bank::where('users_id', Auth::user()->id)->get();
        return view('pages.admin.payment.create', compact('bank'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $data = Payment::create([
            'banks_id' => $request->banks_id,
            'type' => $request->type,
            'status' => 'Y',
        ]);

        if($data->save()){
            toast('Data berhasil ditambahkan', 'success');
            return redirect()->route('payment.index');
        }else{
            toast('Data gagal ditambahkan', 'error');
            return redirect()->route('payment.index');
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
        $bank = Bank::where('users_id', Auth::user()->id)->get();
        $payment = Payment::with('bank')->findOrFail($id);
        return view('pages.admin.payment.edit', compact('payment', 'bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, string $id)
    {
        $data = Payment::findOrFail($id);
        $data->update([
            'banks_id' => $request->banks_id,
            'type' => $request->type,
            'status' => 'Y',
        ]);

        if($data->update()){
            toast('Data berhasil diubah', 'success');
            return redirect()->route('payment.index');
        }else{
            toast('Data gagal diubah', 'error');
            return redirect()->route('payment.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Payment::findOrFail($request->id);
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
