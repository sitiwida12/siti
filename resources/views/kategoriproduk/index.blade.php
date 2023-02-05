@extends('layout.header')

@section('mystyle')
<style>
.card:hover{
    cursor: pointer;
}
</style>
    
@endsection
@section('contents')
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">Our</span> {{Str::ucfirst($judulsec)  }}</h3>
                    <p>Tampilkan semua produk yang berhubungan dengan produk</p>
                </div>
            </div>
        </div>

        
       
    </div>
    
    <div class="container">

        <div class="row row-cols-4 gy-2">
          @foreach ($produk as $prd)
              
          {{-- <div class="col-lg-4 col-md-6"> --}}
              {{-- <div class="single-product-item">
                  <div class="product-image">
                      <a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
                  </div>
                  <h3>Strawberry</h3>
                  <p class="product-price"><span>Per Kg</span> 85$ </p>
                  <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i>More Produk</a>
              </div> --}}
              <div class="col my-2">
                
                      <div class="card" style="width: 18rem;" onclick="redirect('/detail/{{ $prd->id }}');">
                          {{-- {{dd($prd->images1)  }} --}}
                          <img class="card-img-top" src="{{ asset('storage/'.Str::remove('public/', $prd->images1)) }}" alt="Card image cap">
                          <div class="card-body">
                         
                            <p class="card-text">{{ $prd->judul_produk }}</p>
                            {{-- <a href="/" class="btn btn-primary stretched-link">Go somewhere</a> --}}
                            <p class="font-weight-bold"><span class="font-weight-bold">Rp. </span>{{number_format($prd->harga,0,',','.')  }}</p>
                            <div class="d-flex">
                              {{-- <div>*****</div>
                              <div class="ml-3">10Rb+ Terjual</div> --}}
                            </div>
                          </div>
                       
  
                          
                          {{-- <a href="#" class="btn stretched-link">Detail Produk</a> --}}
                      </div>


            

              </div>
  
  
  
          {{-- </div> --}}
          @endforeach
                
           
        </div>
    </div>
</div>
@endsection


@section('myscript')
<script>

function redirect(link){
    // let link = e;
    // console.log(link);
	window.location=link;
}
</script>
@endsection