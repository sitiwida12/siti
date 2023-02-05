@extends('dashboard.admin.layout.header')
@section('contents')


<div class="container">
    <h4>Check Status konfirmasi Pembayaran</h4>
    <div class="row">
        <div class="col-5">
            <form action="/dashboard/konfirmasi-pembayaran/{{ $id }}" method="post">
                @method('put')
                @csrf
               
                <div class="form-group">
                    <input type="text" name="id" value="{{ $id }}"><br>
                    <input type="text" name="id" value="{{ $spem->produk_id }}">
                    <input type="text" name="user_id" value="{{ $spem->user_id }}">
                    <input type="text" name="invoice" value="{{ $spem->invoice }}">
                    <input type="text" name="total_harga" id="total_harga" value="{{ $spem->total_harga }}">
                    <input type="text" name="tujuan_kota" id="tujuan_kota" value="{{ $spem->tujuan_kota }}">
                    <input type="text" name="waktu_pembayaran" id="waktu_pembayaran" value="{{ $spem->waktu_pembayaran }}">
                       
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