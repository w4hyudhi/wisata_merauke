
<?php
use App\Models\Pedagang;
use App\Models\Wisata;

function pedagang()
{
        $surat = Pedagang::where('status','verifikasi')->get();
        return $surat;
}

function wisata()
{
        $wisata = Wisata::all();
        return $wisata;
}


// function total_data($req,$data)
// {
//         $data = Jemaat::where($req,$data)->get()->count();
//         return $data;
// }


// function total_tanggal($data)
// {
//         $data = Jemaat::whereMonth('tanggal_lahir', '=', $data)->get()->count();
//         return $data;
// }
