<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasibayar;
use App\Http\Requests\StoreKonfirmasibayarRequest;
use App\Http\Requests\UpdateKonfirmasibayarRequest;
use App\Models\Paymentc;
use App\Models\Pembelian;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class KonfirmasibayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Pengiriman::join('pembelians','pembelians.id','=',"pengirimen.pembelian_id")->get());
       return view('dashboard.admin.konfirmasi_pembayaran.index',[
            'spembayaran' => Pembelian::all(),
            'spengiriman' => Pengiriman::join('pembelians','pembelians.id','=',"pengirimen.pembelian_id")->get()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $kunci = $request->query('idp');
        // dd($request);
        return view('/dashboard/admin/konfirmasi_pembayaran/create',[
            'spembayaran' => Pembelian::all(),
            'id' =>  $kunci,
            
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKonfirmasibayarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKonfirmasibayarRequest $request)
    {
        $validatedData = $request->validate([
            'pembelian_id' => '',
            'status' => '',
            'status_pengiriman' => ''
            
        ]);

        // $validatedData['user_id'] = 1;
    
        Pengiriman::create($validatedData);
        
        return redirect('/dashboard/konfirmasi-pembayaran')->with('success', 'New post has been added!');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konfirmasibayar  $konfirmasibayar
     * @return \Illuminate\Http\Response
     */
    public function show(Konfirmasibayar $konfirmasibayar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konfirmasibayar  $konfirmasibayar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        // dd(Pembelian::where('id',$id)->get());

        // dd(Paymentc::where('id',$id)->first());
        return view('/dashboard/admin/konfirmasi_pembayaran/edit',[
            'spem' => Pembelian::where('id',$id)->first(),
            'id' =>  $id,
            'img' => Paymentc::where('id',$id)->first()
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKonfirmasibayarRequest  $request
     * @param  \App\Models\Konfirmasibayar  $konfirmasibayar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKonfirmasibayarRequest $request, Konfirmasibayar $konfirmasibayar, $id)
    {
        $validatedData = $request->validate([
            'produk_id' => '',
            'invoice' => '',
            'kuantitas' => '',
            'total_harga' => '',
            'tujuan_kota' => '',
            'status_pembayaran'=>'',
            'waktu_pembayaran' => ''
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Pembelian::where('id', $id)->update($validatedData);

        return redirect('/dashboard/konfirmasi-pembayaran')->with('success', 'Post has been updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konfirmasibayar  $konfirmasibayar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konfirmasibayar $konfirmasibayar)
    {
        //
    }
}
