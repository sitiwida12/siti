<?php

namespace App\Http\Controllers;

use App\Models\Paymentc;
use App\Http\Requests\StorePaymentcRequest;
use App\Http\Requests\UpdatePaymentcRequest;

class PaymentcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('payment-confirm.confirm',[
            'title' => 'Payment Confirmation',
            'active' => '',
            'myid' => $id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment-confirm.confirm',[
            'title' => 'Payment Confirmation',
            'active' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentcRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentcRequest $request)
    {
        
        // dd($request->file('pconfirm_pic')->move(public_path('payment_confirmation')));
        // dd($request);


        $validateData = $request->validate([
            'pembelian_id' => '',
            'images' => 'image|file|max:5087'
        ]);

        $nama = md5_file($request->file('images')->path()); //0b2a9c3fe1a9829f5826ae8d9f22d6a6
        $ext_foto = $request->file('images')->getClientOriginalExtension();
        $foto_file =$nama.".". $ext_foto;
        // $path = $request->file('images')->storeAs('public/map', $foto_file);



        // $validatedData['images'] = $request->file('images')->storeAs('public/payment-confirmation', $foto_file);
        
        if ($request->file('images')) {
          $validateData['images'] = $request->file('images')->store('public/payment-confirmation');
        }
        
        Paymentc::create($validateData);
        return redirect('/user/purchase/?status_pembayaran=1');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paymentc  $paymentc
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentc $paymentc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paymentc  $paymentc
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentc $paymentc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentcRequest  $request
     * @param  \App\Models\Paymentc  $paymentc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentcRequest $request, Paymentc $paymentc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paymentc  $paymentc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentc $paymentc)
    {
        //
    }
}
