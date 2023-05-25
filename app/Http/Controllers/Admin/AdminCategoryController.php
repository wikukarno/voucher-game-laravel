<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Category::query();
            return datatables()->of($query)
                ->addIndexColumn()
                ->editColumn('created_at', function($item){
                    return $item->created_at->isoFormat('dddd, D MMMM Y');
                })
                ->editColumn('action', function ($item) {
                    return '
                        <div class="d-flex">
                            <a href="' . route('category.edit', $item->id) . '" class="btn btn-sm btn-info mx-1">
                                <i class="fas fa-pencil"></i>
                            </a>


                            <button id="btnDelete" class="btn btn-sm btn-danger mx-1" onclick="btnDeleteCategory(' . $item->id . ')"><i class="fas fa-trash"></i></button>
                        </div>

                        
                    ';
                })

                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }
        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = Category::create([
            'name' => $request->name,
        ]);

        if($data->save()) {
            toast('Data berhasil disimpan', 'success');
            return redirect()->route('category.index');
        }else{
            toast('Data gagal disimpan', 'error');
            return redirect()->route('category.create');
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
        $item = Category::findOrFail($id);
        return view('pages.admin.category.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Category::findOrFail($id);
        $data->update([
            'name' => $request->name,
        ]);

        if($data->save()) {
            toast('Data berhasil diperbarui', 'success');
            return redirect()->route('category.index');
        }else{
            toast('Data gagal diperbarui', 'error');
            return redirect()->route('category.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Category::findOrFail($request->id);
        $data->delete();

        if($data->trashed()) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data gagal dihapus'
            ]);
        }
    }
}
