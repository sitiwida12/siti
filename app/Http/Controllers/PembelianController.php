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
use Illuminate\Support\Facades\Http;

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

            // dd($after);

            //collect api data from raja ongkir
            //by id_kota

            // params[origin, destination, weight, courier]


            // dd($kurir=$request->kurir);


            $api_key = 'c94dcd12b8b3fd72d036803317f4e88b';
            // $destination = User::select('kota_id')->where('id',auth()->user()->id)->first();
            // dd($destination);
            // $origin = dd(Produk::join('users','users.id', '=','produks.user_id')->whereIn('produks.id', $after)->select('users.kota_id')->first());
            // dd($origin);
            // $weight = Produk::select('weight')->whereIn('produks.id', $after)->first();
            // dd($weight);
            // $courier = 'jne';


            $response = Http::withHeaders(['key'=> $api_key])->post('https://api.rajaongkir.com/starter/cost',[
                'origin' => '344',
                'destination' => '115',
                'weight' => 1000,
                'courier' => 'pos'
            ]);
            // $collection =collect($response->json()['rajaongkir']['results']);
            // $filter = $collection['rajaongkir']['results']->where('id',1);

            // dd(collect($response->json())['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value']);
            // dd(collect($response->json())['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value']);
            














            
            // $hehe = Produk::all();
            // return $hehe ;
            // dd($after);
            // dd(Produk::first());
            // dd(Produk::select('user_id')->whereIn('id', $after)->distinct()->get());

            // dd(Produk::select("*")->whereIn('id', $after)->distinct()->get());


            $kurir=$request->kurir;
            return view('checkout.checkout',[
                'title' => 'Checkout | Jrahi Market',
                'prdid' => $wadah,
                'pesanan' => Produk::select("*")->whereIn('id', $after)->distinct()->get(),
                'jmlpesan' => Pembelian::count(),
                'penjual' => Produk::whereIn('id', $after)->first(),
                'pembeli' => User::where('id',auth()->user()->id)->first(),
                'active' => '',
                'radiobtnbayar' => Mbayar::all(),
                'kk' => $kurir
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


    public function ongkir(Request $request){
        $wadah = $request->query('state');
        $after = explode(',',$wadah);



        $api_key = 'c94dcd12b8b3fd72d036803317f4e88b';
        // $origin =  User::select('kota_id')->where('id',auth()->user()->id)->first();
        // dd($origin->get());
        // $destination = Produk::join('users','users.id', '=','produks.user_id')->whereIn('produks.id', $after)->select('alamat')->first();
        // $weight = Produk::select('weight')->whereIn('produks.id', $after)->first();
        // $courier = 'jne';
        
        $kurir = $request->kurir;
       

        $response = Http::withHeaders(['key'=> $api_key])->post('https://api.rajaongkir.com/starter/cost',[
            'origin' => '344',
            'destination' => '115',
            'weight' => 1000,
            'courier' => $kurir
        ]);


        // dd(collect($response->json())['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value']);
        // $slug =  SlugService::createSlug(Category::class, 'slug', $request->name);
        //  dd(response()->json($response));
        $result = collect($response->json())['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
        // $result = collect($response->json())['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
        return $result;
    }
}
