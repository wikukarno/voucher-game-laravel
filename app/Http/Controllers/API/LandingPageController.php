<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Voucher;

class LandingPageController extends Controller
{
    public function fetch()
    {
        $voucher = Voucher::with(['category'])->select('id', 'name', 'status', 'categories_id', 'thumbnail')->get();
        return response()->json([
            'status' => 'success',
            'data' => $voucher
        ]);
    }

    public function detailPage(string $id)
    {
        $voucher = Voucher::with(['category', 'nominal'])->find($id);

        if (!$voucher) {
            return response()->json([
                'status' => 'error',
                'message' => 'voucher not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $voucher
        ]);
    }
}
