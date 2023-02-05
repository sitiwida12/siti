<?php

use App\Http\Controllers\DetailController;
use App\Models\Produk;
use App\Models\Konfirmasibayar;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KeuanganController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\KonfirmasibayarController;
use App\Http\Controllers\KonfirmasidanaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\RegisterController;
use App\Models\Keranjang;
use App\Models\Pembelian;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index',[
            'title' => 'Jrahi Market',
            'active' => 'index'
        ]
    );});

// belum dites
Route::get('/toko', function () {
    return view('/toko/index');
});


// about
Route::get('/about',function(){
    return view('about.about',
    [
        'title' => 'About | Jrahi Market',
        'active' => 'about'
    ]
    );
});

// contact
Route::get('/contact',function(){
    return view('contact.contact',[
        'title' => 'Contact | Jrahi Market',
        'active' => 'contact'
    ]);
});



// detail Produk
// Route::get('/detail/{id}', function ($id) {
//     // dd(Produk::where('id',$id)->get());
//     // $sialan = Produk::where('id',$id)->first();
  
//     return view('/detail/index',[
//         'p' => Produk::where('id',$id)->first()
//     ]);


// });


// select semua produk
Route::get('/produk', function (Request $request) {
    $kunci = $request->query('produk');
    // dd(Produk::where('judul_produk','like','%'.$kunci.'%')->get());
    return view('kategoriproduk.index',[
        'title' => 'Produk | Jrahi Market',
        'produk' => Produk::where('judul_produk','like','%'.$kunci.'%')->get(),
        'judulsec' => $kunci,
        'active' => 'index'
    ]);
});






// Route::resource('detail/{id}',KeranjangController::class);
Route::get('detail/{id}', [DetailController::class,'index']);
Route::post('detail/{id}', [DetailController::class,'store'])->middleware('auth');
// Route::put('detail/{id}/edit', [KeranjangController::class,'update']);
// Route::post('detail/{id}/session', [KeranjangController::class,'senddata']);
   






Route::get('/cart',function(){
    return view('whistlist.index',[
        'title' => 'Whistlist | Jrahi Market',
        'wishlist'=> Keranjang::where('user_id', Auth::user()->id)->get(),
        'i'=> 1
    ]);
})->middleware('auth');


// Route::get('/checkout',function(Request $request){
//     $wadah = $request->query('state');
//     $after = explode(',',$wadah);
//     // $hehe = Produk::all();
//     // return $hehe ;
//     // dd($after);
//     return view('/checkout/checkout',[
//         'pesanan' => Produk::whereIn('id', $after)->get(),
//     ]);
// });

Route::resource('/checkout',PembelianController::class)->middleware('auth');


Route::get('/payment',function(Request $request)
{
    $wadah = $request->query('pid');

    return view('payment.pembayaran',[
        'title' => 'Payment | Jrahi Market',
        'paym' => Pembelian::where('invoice', $wadah)->first(),
        
    ]);
})->middleware('auth');









Route::get('/user/purchase',function(Request $request)
{
    // dd($request->query(''));
    $namaobj = 'myquery';
    if ( $request->query() == null) {
        $key = 'status_pembayaran';
        $nilai = null;
        $display = '';
        $selesai = 'd-none';
        $dnilai = 'd-none';
        $queryku = Pembelian::where($key,$nilai)->where('user_id',auth()->user()->id)->get();
        
    } elseif ($request->query('status_pembayaran') == 1) {
        $key = 'status_pembayaran';
        $nilai = $request->query('status_pembayaran');
        $display = 'd-none';
        $selesai = 'd-none';
        $dnilai = 'd-none';
        $queryku = Pembelian::where($key,$nilai)->where('proses_pengiriman',null)->where('user_id',auth()->user()->id)->get();
    } elseif($request->query('proses_pengiriman') == 1) {
        $key = 'proses_pengiriman';
        $nilai = $request->query('proses_pengiriman');
        $display = 'd-none';
        $selesai = '';
        $dnilai = 'd-none';
        $queryku = Pembelian::where($key,$nilai)->where('user_id',auth()->user()->id)->get();
    } elseif($request->query('selesai') == 1) {
        $key = 'selesai';
        $nilai = $request->query('selesai');
        $display = 'd-none';
        $selesai = 'd-none';
        $dnilai = '';
        $queryku = Pembelian::where($key,$nilai)->where('user_id',auth()->user()->id)->get();
    } else {
       return redirect()->back();
    };
    
    // dd( $request->query() );
   
   
    return view('purchase.pembelian',[
        'title' => 'Purchase | Jrahi Market',
        // 'belumbayar' => Pembelian::where($key,$nilai)->get(),
        $namaobj =>  $queryku,
        'display' => $display,
        'selesai' => $selesai,
        'dnilai' => $dnilai,
        'active' => 'shop'
    ]);
})->middleware('auth');

Route::put('/user/purchase/{id}',function($id)
{
    Pembelian::where('id', $id)->update(['selesai'=>1]);
      
    return redirect('/user/purchase/')->with(['success'=> 'Data has updated!',
                                            'warna' => 'warning']);
})->middleware('auth');



Route::get('/penilaian/{id}',function($id){
   return view('feedback.penilaian',[
        'title' => 'Penilaian | Jrahi Market',
        'produk' => Pembelian::where('id',$id)->first()
   ]);
});

Route::post('/penilaian/{id}',function(Request $request){
    $validatedData = $request->validate([
        'pembelian_id' => '',
        'produk_id' => '',
        'penilaian' => ''
        
    ]);

  
    $validatedData['user_id'] = auth()->user()->id;
   
    Penilaian::create($validatedData);

    return redirect('/user/purchase/?selesai=1')->with('success', 'New post has been added!');

});











 // dashboard-seller
Route::get('/seller',function()
{       

    // dd(date('Y'));
    // dd(Pembelian::selectraw('SUM(total_harga) AS TotalSales')->where('selesai',1)->whereMonth('created_at', date('n'))->whereYear('created_at',date('Y'))->where('seller_id',auth()->user()->id)->get());



    // dd(Pembelian::selectraw('YEAR(created_at) as earnYear,MONTHNAME(created_at) as earnMonth')->            selectraw('SUM(total_harga) AS TotalSales')->where('selesai',1)->groupBy('earnYear','earnMonth')->orderBy('earnYear')->orderBy('earnMonth')->get());
    // dd(Pembelian::selectraw('YEAR(created_at) as earnYear,MONTHNAME(created_at) as earnMonth')->            selectraw('SUM(total_harga) AS TotalSales')->where('selesai',1)->groupBy('earnYear','earnMonth')->orderBy('earnYear')->orderBy('earnMonth')->get()->toArray());
    
    $query = Pembelian::selectraw('YEAR(created_at) as earnYear,MONTHNAME(created_at) as earnMonth')->selectraw('SUM(total_harga) AS TotalSales')->where('selesai', 1)->where('seller_id',auth()->user()->id)->groupBy('earnYear','earnMonth')->orderBy('earnYear')->orderBy('earnMonth')->get();

    // dd($query);
    if ($query == null){
        $query =  0 ;
    }else{
        $query =  $query;
    }

    // dd($query);

    // dd(auth()->user()->id);
    // dd(Produk::selectraw('COUNT(id) AS TotalProduk')->where('user_id',auth()->user()->id)->get());

    return view('dashboard.seller.index',[
        'earningm' => Pembelian::where('seller_id',auth()->user()->id),
        'coba' => $query,
        'pbulan' => Pembelian::selectraw('SUM(total_harga) AS TotalSales')->where('selesai',1)->whereMonth('created_at', date('n'))->whereYear('created_at',date('Y'))->where('seller_id',auth()->user()->id)->first(),
        'ptahun' => Pembelian::selectraw('SUM(total_harga) AS TotalSales')->where('selesai',1)->whereYear('created_at',date('Y'))->where('seller_id',auth()->user()->id)->first(),
        'tproduk' => Produk::selectraw('COUNT(id) AS TotalProduk')->where('user_id',auth()->user()->id)->get(),
        'pendingsend'=> Pembelian::selectraw('COUNT(id) AS tpendingsend')->where('status_pembayaran',1)->where('proses_pengiriman', null)->where('seller_id',auth()->user()->id)->first()
        





        // 'objchart' => Pembelian::raw('YEAR(created_at) as SalesYear,
        // MONTHNAME(created_at) as SalesMonth,
        // SUM(total_harga) AS TotalSales')->where('selesai',1)->groupBy('YEAR(created_at)','MONTH(created_at)')->orderBy('YEAR(`created_at`)', 'MONTH(`created_at`)')
 

    ]);


   
})->middleware('auth');
Route::resource('/dashboard/produk', ProdukController::class)->middleware('auth');
Route::resource('/dashboard/pengiriman',PengirimanController::class)->middleware('auth');
Route::resource('/dashboard/keuangan',KeuanganController::class)->middleware('auth');




// dashboard admin
Route::get('/dashboard',function(){

    // $chek = Pembelian::where('status_pembayaran', null)->count();
    // dd($chek);
    return view('dashboard.admin.index',[
        'ust' => Pembelian::where('status_pembayaran', null)->count()
    ]);
})->middleware('admin');

Route::resource('/dashboard/konfirmasi-pembayaran',KonfirmasibayarController::class)->middleware('admin');
Route::resource('/dashboard/user',UserController::class)->middleware('admin');
Route::resource('/dashboard/konfirmasi-tarik-dana',KonfirmasidanaController::class)->middleware('admin');


// registrasi
// Route::resource();







// login system
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

