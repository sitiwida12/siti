<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // dd(Pembelian::where('seller_id',auth()->user()->id)->where('selesai', 1)->sum('total_harga'));
        // dd(Pembelian::sum('total_harga'));
        return view('dashboard.seller.keuangan.index',[
                'omset' => Pembelian::where('seller_id',auth()->user()->id)->where('selesai', 1)->sum('total_harga'),
                'uang' => Keuangan::where('user_id',auth()->user()->id)->get(),
                'dana' => Keuangan::where('user_id',auth()->user()->id)->sum('jumlah_dana')

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jumlah_dana' => '',
            'user_id' => ''
        ]);

      
        // $validatedData['user_id'] = auth()->user()->id;
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Keuangan::create($validatedData);

        return redirect('/dashboard/keuangan')->with('success', 'New post has been added!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
