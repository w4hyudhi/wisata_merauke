<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Fasilitas;
use App\Models\Usaha;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $data = Wisata::with('Fasilitas')->with('Usaha')->with('Even')->get();
        return response()-> json([
            'message' => 'success',
            'data_wisata' => $data,
        ],200);
    }

    public function search(Request $request)
    {

        $data = Wisata::Where('nama', 'like', "%{$request->nama}%")->with('Fasilitas')->with('Usaha')->get();
        return response()-> json([
            'message' => 'success',
            'data_wisata' => $data,
        ],200);

    }
}
