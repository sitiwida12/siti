<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Http\Requests\StorePengirimanRequest;
use App\Http\Requests\UpdatePengirimanRequest;
use App\Models\Pembelian;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.seller.pengiriman.index',[
            'dikirim'=> Pembelian::where('seller_id',auth()->user()->id)->get()
        ]);
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
     * @param  \App\Http\Requests\StorePengirimanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengirimanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(Pembelian::where('id',$id)->get());
        return view('/dashboard/seller/pengiriman/edit',[
            'pkirim'=> Pembelian::where('id',$id)->first(),
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengirimanRequest  $request
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengirimanRequest $request,$id)
    {
        // dd($request);
        $validatedData = $request->validate([
            'produk_id' => '',
            'seller_id' => '',
            'invoice' => '',
            'kuantitas' => '',
            'total_harga' => '',
            'tujuan_kota' => '',
            'status_pembayaran'=>'',
            'waktu_pembayaran' => '',
            'proses_pengiriman' => ''
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Pembelian::where('id', $id)->update($validatedData);

        return redirect('/dashboard/pengiriman')->with('success', 'Post has been updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        //
    }
}
