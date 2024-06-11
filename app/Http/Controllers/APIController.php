<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;

class APIController extends Controller
{
    public function searchlaptop(Request $request)
    {
        $cari = $request->input('q');

        $laptop = Laptop::where('nama','LIKE', "%$cari%")->get();
        if ($laptop->isEmpty())
        {
            return response()->json([
                'success' => false,
                'data' => 'DATA TIDAK DITEMUKAN'
            ], 200)->header('Access-Control-Allow-Origin','http://127.0.0.1:8000');
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => $laptop
            ], 200)->header('Access-Control-Allow-Origin','http://127.0.0.1:8000');
        }
    }
}
