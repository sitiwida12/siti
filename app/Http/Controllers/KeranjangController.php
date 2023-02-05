<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreKeranjangRequest;
use App\Http\Requests\UpdateKeranjangRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, HttpRequest $request)
    {
    //    return $id;
    // $request->method();
    //    return $request->key;
       return view('/detail/index',[
                'p' => Produk::where('id',$id)->first()
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
     * @param  \App\Http\Requests\StoreKeranjangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeranjangRequest $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'produk_id' => 'required',
            'user_id' => 'required',
            'kuantitas' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        Keranjang::create($validatedData);
        // return redirect($request->getRequestUri())->with('success','Yeay! Requestmu Telah Terkirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeranjangRequest  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeranjangRequest $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
