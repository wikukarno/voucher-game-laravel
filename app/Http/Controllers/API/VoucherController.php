<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function fetch()
    {
        $voucher = Voucher::select('id', 'name', 'users_id', 'nominals_id', 'categories_id', 'thumbnail')->get();
        return response()->json([
            'status' => 'success',
            'data' => $voucher
        ]);
    }
}
