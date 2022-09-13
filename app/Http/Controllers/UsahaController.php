<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Http\Requests\StoreUsahaRequest;
use App\Http\Requests\UpdateUsahaRequest;
use PDF;
use DateTime;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Usaha::all()->sortByDesc('id');
        return view('umkm.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsahaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsahaRequest $request,$id)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/usaha/',$nama_dokumen);
            $request->request->add(['foto'=>'images/usaha/'.$nama_dokumen]);
            }
        $request->request->add(['wisata_id'=>$id]);
        $data=Usaha::create($request->all());
        return redirect()->back()->with('success', 'Usaha Ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function show(Usaha $usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function edit(Usaha $usaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsahaRequest  $request
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsahaRequest $request, Usaha $usaha,$id)
    {
        $usaha = $usaha->find($id);
        $usaha->nama = $request->nama;
        $usaha->jenis = $request->jenis;
        $usaha->pedagang_id = $request->pedagang_id;
        $usaha->tanggal = $request->tanggal;
        $usaha->keterangan = $request->keterangan;
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/usaha/',$nama_dokumen);
            $usaha->foto = 'images/usaha/'.$nama_dokumen;
            }
        $usaha->update();
        return redirect()->back()->with('success', 'Fasilitas Wisata di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usaha $usaha,$id)
    {
        $usaha=$usaha->find($id);
            $usaha->delete();
           return redirect()->back()->with('success', 'Usaha Berhasil Dihapus.');
    }

     public function laporan(Request $request)
    {

        $expiry = explode("-", $request->bdaymonth);
        $month = $expiry[1];
        $year = $expiry[0];

       // dd($month);

       $data = Usaha::whereYear('tanggal', '=',  $year)
       ->whereMonth('tanggal', '=', $month)
       ->get()->sortByDesc('id');


       //$monthNum  = 3;
       $dateObj   = DateTime::createFromFormat('!m', $month);
       $monthName = $dateObj->format('F'); // March

       //dd($monthName.' '.$year);

       $data->tanggal =  $monthName.' '.$year;

       $pdf = PDF::loadView('umkm.laporan',['data' => $data])->setPaper('a4','landscape');
       return $pdf->download("Surat Masuk ".$monthName." ".$year.".pdf");

    }

}
