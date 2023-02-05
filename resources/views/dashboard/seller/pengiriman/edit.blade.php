@extends('dashboard.seller.layout.header')
@section('contents')
     {{-- Main Content --}}


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Status Pengiriman</h1>
           
        </div>

        <!-- Content Row -->
        <div class="row">

        </div>

        <!-- Content Row -->

        <div class="row">
            <form  action="/dashboard/pengiriman/{{ $id }}" method="POST">
                @method('put')
                @csrf

                {{-- <input type="text" name="id" value="{{ $id }}"><br> --}}
                {{-- <input type="text" name="produk_id" value="{{ $pkirim->produk_id }}"><br> --}}
                {{-- <input type="text" name="user_id" value="{{ $pkirim->user_id}}"><br> --}}
                {{-- <input type="text" name="seller_id" value="{{ $pkirim->seller_id}}"><br>
                <input type="text" name="invoice" value="{{ $pkirim->invoice }}"><br>
                <input type="text" name="total_harga" id="total_harga" value="{{ $pkirim->total_harga }}"><br>
                <input type="text" name="tujuan_kota" id="tujuan_kota" value="{{ $pkirim->tujuan_kota }}"><br>
                <input type="text" name="waktu_pembayaran" id="waktu_pembayaran" value="{{ $pkirim->waktu_pembayaran }}"><br>
                <input type="text" name="status_pembayaran" id="status_pembayaran" value="{{ $pkirim->status_pembayaran }}"><br>
                   --}}
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="proses_pengiriman">
                    <option selected>Proses Pengiriman</option>
                    <option value="1">Dikirim</option>
                </select><br>

                <button type="submit">Update</button>
            </form>
        </div>

        
    </div>
    <!-- /.container-fluid -->

</div>
{{-- End of Main Content --}}
@endsection