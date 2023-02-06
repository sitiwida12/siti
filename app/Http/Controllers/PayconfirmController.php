<?php

namespace App\Http\Controllers;

use App\Models\Payconfirm;
use Illuminate\Http\Request;

class PayconfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment-confirm.confirm',[
            'title' => 'Payment Confirmation',
            'active' => ''
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
        // dd($request->file('pconfirm_pic')->move(public_path('payment_confirmation')));
        dd($request->file('pconfirm_pic'));


        $validateData = $request->validate([
            'pembelian_id' => '',
            'pconfirm_pic' => 'image|file|max:5087'
        ]);

        // $validatedData['pconfirm_pic'] = $request->file('pconfirm_pic')->store('payment_confirmation','public');
        
        
        // $validateData['pconfirm_pic'] = $request->move('pconfirm_pic');

        // $validateData['pconfirm_pic'] = $request->move('pconfirm_pic');
        
        $validateData['pconfirm_pic'] = $request->file('image')->move(public_path('img/products/'), $request->file('image')->getClientOriginalName());
        
        
        
        Payconfirm::create($validateData);
        return redirect('/user/purchase/?status_pembayaran=1');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payconfirm  $payconfirm
     * @return \Illuminate\Http\Response
     */
    public function show(Payconfirm $payconfirm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payconfirm  $payconfirm
     * @return \Illuminate\Http\Response
     */
    public function edit(Payconfirm $payconfirm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payconfirm  $payconfirm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payconfirm $payconfirm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payconfirm  $payconfirm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payconfirm $payconfirm)
    {
        //
    }
}
