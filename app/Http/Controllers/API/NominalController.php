<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Nominal;
use Illuminate\Http\Request;

class NominalController extends Controller
{
    public function fetch()
    {
        $nominals = Nominal::select('id', 'coinName', 'coinQuantity', 'price')->get();
        return response()->json([
            'status' => 'success',
            'data' => $nominals
        ]);
    }
}
