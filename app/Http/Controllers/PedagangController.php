<?php

namespace App\Http\Controllers;

use App\Models\Pedagang;
use App\Http\Requests\StorePedagangRequest;
use App\Http\Requests\UpdatePedagangRequest;

class PedagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data = Pedagang::all()->sortByDesc('id');
        return view('pedagang.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedagang.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePedagangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedagangRequest $request)
    {
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/pedagang/',$nama_dokumen);
            $request->request->add(['foto'=>'images/pedagang/'.$nama_dokumen]);
            }
        $request->request->add(['status'=>'proses']);
        $data=Pedagang::create($request->all());
        return redirect()->route('pedagang.index')->with('success', 'Pedagang Ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedagang  $pedagang
     * @return \Illuminate\Http\Response
     */
    public function show(Pedagang $pedagang,$id)
    {
        $pedagang= $pedagang->find($id);
        // dd( $pedagang);


        return view('pedagang.view',compact('pedagang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedagang  $pedagang
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedagang $pedagang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedagangRequest  $request
     * @param  \App\Models\Pedagang  $pedagang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedagangRequest $request, Pedagang $pedagang,$id)
    {


        switch ($request->input('action')) {
        case 'simpan':
        $pedagang = $pedagang->find($id);
        $pedagang->nama = $request->nama;
        $pedagang->email = $request->email;
        $pedagang->telp = $request->telp;
        $pedagang->jenis_kelamin = $request->jenis_kelamin;
        $pedagang->alamat = $request->alamat;
        $pedagang->tanggal_lahir = $request->tanggal_lahir;
        if($request->hasFile('image')){
            $dokumen = $request->file('image');
            $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $dokumen->move('images/pedagang/',$nama_dokumen);
            $pedagang->foto = 'images/pedagang/'.$nama_dokumen;}

        $pedagang->update();
        return redirect()->back()->with('success', 'Pedagang di update');
        break;

        default:
        $pedagang = $pedagang->find($id);
        $pedagang->status = "verifikasi";
        $pedagang->update();
        return redirect()->back()->with('success', 'Pedagang berhasil terverifikasi');
        break;

    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedagang  $pedagang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedagang $pedagang,$id)
    {
        $pedagang=$pedagang->find($id);

        $pedagang->delete();
       return redirect()->back()->with('success', 'Pedagang Berhasil Dihapus.');
    }
}
