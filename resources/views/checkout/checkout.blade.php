@extends('layout.header')
@section('mystyle')
    <link rel="stylesheet" href=" {{ asset('/assets/css/checkout/checkout.css') }}">
@endsection
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Check Out</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

{{-- <title>Check Out</title> --}}

<div class="container mt-150">
    <h3>Check Out</h3>
</div>


<div class="alamat-user mt-5">
    <div class="container box-alamat-user py-4">
        <h5>Alamat Pengiriman</h5>
        <div class="container">
            <div class="row">
                <div class="col-3 fw-bold">
                    <div class="row">{{ $pembeli->name }} (62+) {{ $pembeli->no_telp }}</div>
                </div>
                {{-- <div class="col-7" id="alamat">Jl. Darma Bakti 163 Perum Veteran No.6 Medono, KOTA PEKALONGAN - PEKALONGAN BARAT, JAWA TENGAH, ID 51111</div> --}}
                <div class="col-7" id="alamat">{{ $pembeli->alamat }}</div>
                {{-- <div class="col-2"><a href="#">UBAH</a></div> --}}
            </div>
        </div>
    </div>
</div>

{{-- {{ dd($pesanan) }} --}}

<table class="table table-borderless container mt-5">
    <thead>
        <tr>
            <th colspan="2">Produk Dipesan</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Subtotal Produk</th>
        </tr>
    </thead>


    <tbody>
        <form action="" method="post">
            @csrf

            <input type="hidden" name="produk_id" value="{{ $prdid }}">
            <input type="hidden" name="seller_id" value="{{ $penjual->user_id }}">
            <input type="hidden" name="invoice"
                value="INV{{ sprintf('%07d', $prdid) }}{{ $jmlpesan + 1 }}{{ auth()->user()->id }}">
            <input type="hidden" name="total_harga" id="total_harga">
            <input type="hidden" name="tujuan_kota" id="tujuan_kota">
            <input type="hidden" name="waktu_pembayaran" id="waktu_pembayaran" value="">
            <input type="hidden" name="harga_satuan" value="{{ $pesanan[0]['harga'] }}">



















            @foreach ($pesanan as $psn)
                {{-- @for ($i = 0; $i < count($pesanan); $i++) --}}



                <tr class="align-middle">

                    <td style="width: 100px">

                        <img src="{{ asset('storage/' . Str::remove('public/', $psn->images1)) }}" alt="..."
                            class="img-thumbnail me-3" style="width: inherit;">

                        {{-- {{ $pesanan[$i]['judul_produk']}} --}}
                    </td>

                    <td> {{ $psn->judul_produk }}</td>

                    <td id="hargasatuan">Rp. {{ $psn->harga }} </td>
                    <td id="quantitas"><input type="number" name="kuantitas" id="kuantitas" value="1"></td>
                    <td id="subtotal" class="text-right"></td>
                </tr>
                <tr>
                    <td colspan="2">Pesan <input type="text"></td>

                    <td colspan="3" class="text-right" id="ttl"></td>
                </tr>
            @endforeach
            {{-- @endfor --}}
    </tbody>
</table>



{{-- metode pembayaran --}}

<div class="">
    <div class="payment-method container py-5">
        <div class="row">
            <div class="col-2">
                <h5>Metode Pembayaran</h5>
            </div>
            <div class="col-10">

                @foreach ($radiobtnbayar as $rbb)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="mbayar_id" id="mbayar_id"
                            value="{{ $rbb->id }}" required>
                        <label class="form-check-label" for="mbayar_id">
                            {{ $rbb->jenis_bayar }}
                        </label>
                    </div>
                @endforeach

            </div>
            <div class="col-2">
                <h5>Jasa Kirim</h5>
            </div>
            <div class="col-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jaskir" id="jne" value="jne"
                        required>
                    <label class="form-check-label" for="jaskir">
                        JNE
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jaskir" id="pos" value="pos"
                        required>
                    <label class="form-check-label" for="jaskir">
                        POS Indonesia
                    </label>
                </div>
            </div>
        </div>

        {{-- row radio button --}}


        <table class="totalan">
            <tr>
                <td width="80%">Subtotal untuk Produk</td>
                <td class="jml" id="tk"></td>
            </tr>
            <tr>
                <td width="80%">Total Ongkos Kirim</td>
                <td class="jml" id="ongkir"></td>
            </tr>
            <tr>
                <td width="80%">Total Pembayaran</td>
                <td class="jml" id="tp">Rp.22.000</td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary mt-4">Bayar</button>
        </form>

    </div>
</div>




@section('myscript')
    <script>
        $(document).ready(function() {
            // const urlParams = new URLSearchParams(window.location.search);

            // const param_x = urlParams.get('state');
            // const url= '/checkongkir?kurir=' + value + '&state=' + $.urlParam('state'),
            // console.log(url);

            let kuantitas = $('#kuantitas').val();
            let hargasatuan = $('#hargasatuan').text();

            // console.log(hargasatuan);


            let hs = hargasatuan.slice(4);
            // console.log(hs);



            let total = hs * kuantitas;
            // console.log(total);


            $('#subtotal').text(toRupiah(total));
            // console.log(subtotal);

            $('#ttl').text($('#subtotal').text());
            // console.log( $('#ttl').text());

            $('#tk').text($('#subtotal').text());

            let tk = $('#tk').text();
            // console.log(tk);
            // console.log($('#subtotal').text((total)));

            // $('#tp').text($('#tk').text());
            // console.log(typeof(~~tk));
            // console.log(typeof(~~tk.text()));

            // let tp = $('#tp').text();
            // console.log(tp);

            let ongkir = $('#ongkir').text();
            // console.log(ongkir);
           

            if (ongkir === '') {
                ongkir = 0;
                //   console.log(typeof(ongkir));
            }

            //rumus total pembayaran
            // subtotal + ongkir
            // tk + ongkir

            jumlah = ~~tk.slice(2).replace(',00', '').replaceAll('.', '') + ~~ongkir;
            // console.log(jumlah);
            // console.log(ongkir);

            let tp = $('#tp').text(toRupiah(jumlah));
            // console.log(tp);



            $('#total_harga').val(tp.text().slice(2).replace(',00', '').replaceAll('.', ''));

            // let tk1 = tk.slice(5).replace(".","");
            $('#tujuan_kota').val($('#alamat').text());
            // let time = new Date().getTime();




            // console.log(tk);
            // let ongkir = $('#ongkir').text();
            // let tp = $('#tp').text(tk+ongkir);
            // console.log(ongkir);






        });

        $('#kuantitas').change(function(e) {
            e.preventDefault();
            // let kuantitas = $('#kuantitas').val();
            let kuantitas = $('#kuantitas').val();
            // console.log(kuantitas);



            let hargasatuan = $('#hargasatuan').text();
            let hs = hargasatuan.slice(4);


            let total = hs * kuantitas;
            $('#subtotal').text(toRupiah(total));
            let hia = $('#subtotal').text();
            $('#ttl').text(hia);
            $('#tk').text($('#subtotal').text());
            // $('#tp').text($('#tk').text());

           
            let tk = $('#tk').text().slice(2).replace(',00', '').replaceAll('.', '');
            // console.log(tk);

            let ongkir = $('#ongkir').text().slice(2).replace(',00', '').replaceAll('.', '');

            jumlah = ~~tk + ~~ongkir;


            let tp = $('#tp').text(toRupiah(jumlah));

            // let ongkir = $('#ongkir').text();
            // let tp = $('#tp').text(tk+ongkir);


            $('#total_harga').val(tp.slice(2).replace(',00', '').replaceAll('.', ''));
            // console.log(toRupiah(total));
        });

        $('#kuantitas').keyup(function(e) {
            e.preventDefault();
            // let kuantitas = $('#kuantitas').val();
            let kuantitas = $('#kuantitas').val();
            // console.log(kuantitas);

            let hargasatuan = $('#hargasatuan').text();
            let hs = hargasatuan.slice(4);

            let total = hs * kuantitas;
            $('#subtotal').text(toRupiah(total));

            let hia = $('#subtotal').text();
            $('#ttl').text(hia);

            // $('#tp').text($('#tk').text());
            $('#tk').text($('#subtotal').text());
            
            let tk = $('#tk').text().slice(2).replace(',00', '').replaceAll('.', '');
            // console.log(tk);

            let ongkir = $('#ongkir').text().slice(2).replace(',00', '').replaceAll('.', '');
            console.log(ongkir);

            if (ongkir === '') {
                ongkir = 0;
            }

            console.log(ongkir);


            jumlah = ~~tk + ~~ongkir;
            // console.log(jumlah);

            let tp = $('#tp').text(toRupiah(jumlah));

            // let ongkir = $('#ongkir').text();
            // let tp = $('#tp').text(tk+ongkir);

            $('#total_harga').val(tp.slice(2).replace(',00', '').replaceAll('.', ''));
            // console.log(toRupiah(total));
        });


        $('#jne').change(function() {
            let value = $(this).val();

            $.ajax({
                url: '/checkongkir?kurir=' + value,
                method: 'GET',
                success: function(result) {
                    $('#ongkir').text(toRupiah(result));
                    let tk = $('#tk').text().slice(2).replace(',00', '').replaceAll('.', '');
                    // console.log(tk);

                    let ongkir = $('#ongkir').text().slice(2).replace(',00', '').replaceAll('.', '');
                  ;

                    jumlah = ~~tk + ~~ongkir;
                    // console.log(jumlah);
                    // console.log(ongkir);

                    let tp = $('#tp').text(toRupiah(jumlah));
                    // console.log(tp);



                    $('#total_harga').val(tp.text().slice(2).replace(',00', '').replaceAll('.', ''));
                }
            });





        });


        $('#pos').change(function() {
            let value = $(this).val();

            $.ajax({
                url: '/checkongkir?kurir=' + value,
                method: 'GET',
                success: function(result) {
                    $('#ongkir').text(toRupiah(result));
                    let tk = $('#tk').text().slice(2).replace(',00', '').replaceAll('.', '');
                    console.log(tk);

                    let ongkir = $('#ongkir').text().slice(2).replace(',00', '').replaceAll('.', '');

                    jumlah = ~~tk + ~~ongkir;
                   
                    let tp = $('#tp').text(toRupiah(jumlah));
                   


                    $('#total_harga').val(tp.text().slice(2).replace(',00', '').replaceAll('.', ''));
                }
            });





        });
    </script>
@endsection
