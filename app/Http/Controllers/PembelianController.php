<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Pembelian;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Models\User;
use App\Models\Mbayar;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString());
            $wadah = $request->query('state');
            $after = explode(',',$wadah);
            // $hehe = Produk::all();
            // return $hehe ;
            // dd($after);
            // dd(Produk::first());
            // dd(Produk::select('user_id')->whereIn('id', $after)->distinct()->get());

            // dd(Produk::select("*")->whereIn('id', $after)->distinct()->get());
            return view('checkout.checkout',[
                'title' => 'Checkout | Jrahi Market',
                'prdid' => $wadah,
                'pesanan' => Produk::select("*")->whereIn('id', $after)->distinct()->get(),
                'jmlpesan' => Pembelian::count(),
                'penjual' => Produk::whereIn('id', $after)->first(),
                'pembeli' => User::where('id',auth()->user()->id)->first(),
                'active' => '',
                'radiobtnbayar' => Mbayar::all()
               

        ]);
    }

    /**
     * Show the form for creating ll new resource.
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
     * @param  \App\Http\Requests\StorePembelianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembelianRequest $request)
    {
        $request['waktu_pembayaran']=Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString();
        
        $pd = $request['invoice'];


        $validatedData = $request->validate([
            'produk_id' => '',
            'invoice' => '',
            'user_id'=>'',
            'seller_id'=>'',
            'harga_satuan'=>'',
            'kuantitas' => '',
            'total_harga' => '',
            'tujuan_kota' => '',
            'waktu_pembayaran' => '',
            'mbayar_id'=> ''
        ]);

        $validatedData['user_id'] = auth()->user()->id;
      


        Pembelian::create($validatedData);

        return redirect('/payment/?pid='.$pd)->with('success', 'New post has been added!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembelianRequest  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
