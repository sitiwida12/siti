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
        $validateData = $request->validate();
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
