<?php

namespace App\Http\Controllers;

use App\Models\Even;
use App\Http\Requests\StoreEvenRequest;
use App\Http\Requests\UpdateEvenRequest;

class EvenController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEvenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvenRequest $request,$id)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/even/',$nama_dokumen);
            $request->request->add(['poster'=>'images/even/'.$nama_dokumen]);
            }
        $request->request->add(['wisata_id'=>$id]);
        $data=Even::create($request->all());
        return redirect()->back()->with('success', 'Even Ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Even  $even
     * @return \Illuminate\Http\Response
     */
    public function show(Even $even)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Even  $even
     * @return \Illuminate\Http\Response
     */
    public function edit(Even $even)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvenRequest  $request
     * @param  \App\Models\Even  $even
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvenRequest $request, Even $even,$id)
    {
        $even = $even->find($id);
        $even->nama = $request->nama;
        $even->jenis = $request->jenis;
        $even->keterangan = $request->keterangan;
        $even->tanggal = $request->tanggal;
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/even/',$nama_dokumen);
            $even->poster = 'images/even/'.$nama_dokumen;
            }
        $even->update();
        return redirect()->back()->with('success', 'Even di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Even  $even
     * @return \Illuminate\Http\Response
     */
    public function destroy(Even $even,$id)
    {
        $even=$even->find($id);
        $even->delete();
       return redirect()->back()->with('success', 'Even Berhasil Dihapus.');
    }
}
