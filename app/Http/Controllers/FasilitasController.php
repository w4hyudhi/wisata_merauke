<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Http\Requests\StoreFasilitasRequest;
use App\Http\Requests\UpdateFasilitasRequest;

class FasilitasController extends Controller
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
     * @param  \App\Http\Requests\StoreFasilitasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFasilitasRequest $request,$id)
    {

        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/fasilitas/',$nama_dokumen);
            $request->request->add(['foto'=>'images/fasilitas/'.$nama_dokumen]);
            }
        $request->request->add(['wisata_id'=>$id]);
        $data=Fasilitas::create($request->all());
        return redirect()->back()->with('success', 'Fasilitas Ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasRequest  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFasilitasRequest $request, Fasilitas $fasilitas,$id)
    {
        $fasilitas = $fasilitas->find($id);
        $fasilitas->nama = $request->nama;
        $fasilitas->jenis = $request->jenis;
        $fasilitas->tahun = $request->tahun;
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/fasilitas/',$nama_dokumen);
            $fasilitas->foto = 'images/fasilitas/'.$nama_dokumen;
            }
        $fasilitas->update();
        return redirect()->back()->with('success', 'Fasilitas Wisata di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas,$id)
    {
        $fasilitas=$fasilitas->find($id);
            $fasilitas->delete();
           return redirect()->back()->with('success', 'Fasilitas Berhasil Dihapus.');
    }
}
