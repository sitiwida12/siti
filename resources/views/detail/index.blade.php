@extends('layout.header')
@section('mystyle')
<link rel="stylesheet" href="{{ asset('assets/css/slider/lightslider.css') }}">
<style>
    .detail{
        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
    }
    .deskripsi{
        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
    }
</style>
@endsection


@section('contents')
<div class="product-section mt-150 mb-150">
  
    <div class="detail container">
        <div class="container p-5">
            <div class="row">
               
                <div class="col-5">
                    <ul id="imageGallery">

                     
                        <li data-thumb="{{ asset('storage/'.Str::remove('public/', $p->images1) ) }}" data-src="{{asset('storage/'.Str::remove('public/', $p->images1))  }}">
                       

                                <img style="height: 400px; width: 400px; object-fit: contain;" src="{{ asset('storage/'.Str::remove('public/', $p->images1)) }}" width="643" height="643"  />
                         
                        </li>
                       
     
                    
                    </ul>
                </div>
                <div class="col-7">
                    <div class="row ml-4">
                        <h3 class="font-weight-normal">
                            {{  $p->judul_produk}}
                        </h3>
                    </div>
                    <div class="row mt-4  ml-4">
                        <h3>Rp. {{ $p->harga}}</h3>
                    </div>
                    <div class="row mt-5  ml-4">
                        <div class="d-inline">

                           
                            <form action="" id="formku" method="post" enctype="multipart/form-data">
                                @csrf
                                Kuantitas
                              <input type="hidden" name="produk_id" id="produk_id" value="{{ $p->id }}">
                              <input type="hidden" name="user_id" id="user_id" value="1">
                              <input class="ml-5" type="number" name="kuantitas" id="kuantitas" value="1"> tersisa 100 buah
                              <input type="hidden" name="status" id="status" value="1">
                              
                        </div>
                    </div>
                    <div class="row  ml-4" >
                            {{-- <button class="btn btn-primary mr-3" type="submit" id="keranjang">Masukkan Keranjang</button> --}}
                        </form>
                    
                        <a class="btn btn-primary" href="/checkout/?state={{ $p->id }}" role="button">Beli Sekarang</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="deskripsi container p-5">
        <h3>Deskripsi Produk</h3>
        {!! $p->deskripsi_produk !!}
    </div>

    {{-- <div class="penilaian-produk border border-dark container p-5">
        <h3>Penilaian Produk</h3>
        <div class="nilai-user">
            <div class="row">
                <div class="col-1">
                    foto akun
                </div>
                <div class="col11">
                     nama akun
                     bintang
                     *****  <br>
                     tanggal
                     22-05-27 16:53
                     text nilai
                     <p>bag yg sy tunjuk itu ad elastis. yg sebaliknya ada strap pengencang. supertebel. panjangnya ngelebihin pergelangan tangan sampe se kancing manset baju saya. jd tangan aman ga kepanasan</p>
                </div>
            </div>
            
           
        </div>
    </div> --}}


</div>
@endsection


@section('myscript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{ asset('assets/js/slider/lightslider.js') }}"></script>

<script>
    $(document).ready(function () {
        let qty = $('#kuantitas').val();
        console.log(qty);

        // $( '#my-slider' ).sliderPro();
        // console.log($('#kuantitas').val());
       $(document).on("click","#keranjang", function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });


                let myform = $('#formku').serialize();
                console.log(myform);
                // console.log($('#kuantitas').val());
                let kuantitas = $('#kuantitas').val();
                $.ajax({
                    type: "post",
                    url: '/detail/{{$p->id}}',
                    data: myform,
                    success: function(store) {
                    
                        
                    },
                    error: function() {
                    }
                });
        });
        // GALERY
        $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:9,
                slideMargin:0,
                enableDrag: false,
                currentPagerPosition:'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
            }  
        });
         

        

    });  


    $('#kuantitas').change(function (e) { 
        e.preventDefault();
        let qty = $('#kuantitas').val();
        console.log(qty);
        
    });
   

    // $(document).on("click","#keranjang",function(e) {
    //         e.preventDefault();
    //         let kuantitas = $('#kuantitas').val();
    //         // $.ajax({
    //         //     type: "post",
    //         //     url: 'detail/{{ $p->id }}',
    //         //     data: {produk_id:{{ $p->id }}, 
    //         //            kuantitas:kuantitas},
    //         //     success: function(store) {
    //         //         console.log(store);
    //         //     },
    //         //     error: function() {
    //         //     }
    //         // });
        
    //     )};
</script>

@endsection