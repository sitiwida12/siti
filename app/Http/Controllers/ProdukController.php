<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.seller.produk.index',[
            'data' => Produk::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.seller.produk.tambah_produk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        // dd($request);
        // $i=1;
        // dd($request->file('images'.$i));
        // dd($request->file('images1','images2','images3'));
        $validatedData = $request->validate([
            'judul_produk' => '',
            'harga' => '',
            'images1' => 'image|file|max:5087',
            'images2' => 'image|file|max:5087',
            'images3' => 'image|file|max:5087',
            'stock' => '',
            'deskripsi_produk' => '',
            'weight' => ''
        ]);

        for ($i=1; $i <= 3; $i++) { 
            if ($request->file('images'.$i)) {
                $validatedData['images'.$i] = $request->file('images'.$i)->store('public/produk-image');
            }
        }

        // $validatedData['user_id'] = auth()->user()->id;
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Produk::create($validatedData);

        return redirect('/dashboard/produk')->with(['success'=> 'Produk Berhasil Ditambahkan',
        'warna' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.seller.produk.edit', [
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'judul_produk' => '',
            'harga' => '',
            'images1' => 'image|file|max:1024',
            'images2' => 'image|file|max:1024',
            'images3' => 'image|file|max:1024',
            'stock' => '',
            'deskripsi_produk' => '',
            'weight' => ''
        ]);

        for ($i=1; $i <= 3; $i++) { 
          
            if ($request->file('images'.$i)) {
                if ($request->oldimages.$i) {
                    Storage::delete($request->oldimages.$i);
                }
                $validatedData['images'.$i] = $request->file('images'.$i)->store('produk-image','public');
            }
        }

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Produk::where('id', $produk->id)->update($validatedData);

        return redirect('/dashboard/produk')->with(['success'=> 'Produk Berhasil Diupdate',
        'warna' => 'warning']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        for ($i=1; $i <= 3; $i++) {
            if ($produk->images.$i) {
                Storage::delete($produk->images.$i);
            }
        };

        Produk::destroy($produk->id);

        return redirect('/dashboard/produk')->with(['success'=> 'Produk Berhasil Dihapus',
        'warna' => 'danger']);
    
    }
}
