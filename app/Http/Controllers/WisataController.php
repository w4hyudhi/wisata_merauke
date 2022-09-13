<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Http\Requests\StoreWisataRequest;
use App\Http\Requests\UpdateWisataRequest;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisata.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWisataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWisataRequest $request)
    {
         // dd($request);
         if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/wisata/',$nama_dokumen);
            $request->request->add(['foto'=>'images/wisata/'.$nama_dokumen]);
            }

        $data=Wisata::create($request->all());
        return redirect()->route('wisata.view',$data->id)->with('success', 'Tempat Wisata Berhasil Ditambah.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata,$id)
    {
         $wisata= $wisata->find($id);



        return view('wisata.view',compact('wisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Wisata $wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWisataRequest  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWisataRequest $request, Wisata $wisata,$id)
    {
        $wisata = $wisata->find($id);
        $wisata->nama = $request->nama;
        $wisata->alamat = $request->alamat;
        $wisata->keterangan = $request->keterangan;
        $wisata->jadwal = $request->jadwal;
        $wisata->harga = $request->harga;
        $wisata->latitude = $request->latitude;
        $wisata->longitude = $request->longitude;


        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/wisata/',$nama_dokumen);
            $wisata->foto = 'images/wisata/'.$nama_dokumen;
            }
        $wisata->update();

        return redirect()->back()->with('success', 'Tempat Wisata di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata,$id)
    {
        $wisata=$wisata->find($id);
            $wisata->delete();
           return redirect()->back()->with('success', 'Tempat Wisata Berhasil Dihapus.');
    }
}
