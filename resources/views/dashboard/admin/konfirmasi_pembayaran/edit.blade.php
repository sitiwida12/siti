@extends('dashboard.admin.layout.header')
@section('contents')


<div class="container">
    <h4>Check Status konfirmasi Pembayaran</h4>
    <div class="row">
        <div class="col-5">
            <img src="{{ asset('storage/'.Str::remove('public/', $img->images)) }}" alt="" srcset="" width="100%">
            
            <form action="/dashboard/konfirmasi-pembayaran/{{ $id }}" method="post">
                @method('put')
                @csrf
               
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $id }}"><br>
                    <input type="hidden" name="id" value="{{ $spem->produk_id }}">
                    <input type="hidden" name="user_id" value="{{ $spem->user_id }}">
                    <input type="hidden" name="invoice" value="{{ $spem->invoice }}">
                    <input type="hidden" name="total_harga" id="total_harga" value="{{ $spem->total_harga }}">
                    <input type="hidden" name="tujuan_kota" id="tujuan_kota" value="{{ $spem->tujuan_kota }}">
                    <input type="hidden" name="waktu_pembayaran" id="waktu_pembayaran" value="{{ $spem->waktu_pembayaran }}">
                       
                    <label for="sp">Status Pembayaran</label>
                    <select class="form-control" name="status_pembayaran" id="sp">
                        <option>Default select</option>
                        <option value="1">Sudah Bayar</option>
                        <option value="2">Belum Bayar</option>
                    </select>
                
                </div>
                <button type="submit" class="btn btn-warning text-dark">Konfirmasi Pembayaran</button>
            </form>
        </div>
    </div>
</div>

@endsection