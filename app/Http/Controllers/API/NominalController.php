<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Nominal;
use Illuminate\Http\Request;

class NominalController extends Controller
{
    public function fetch()
    {
        $nominals = Nominal::all();
        return response()->json([
            'status' => 'success',
            'data' => $nominals
        ]);
    }
}
