@extends('dashboard.admin.layout.header')
@section('contents')
   
<div class="container">
    <h4>Check Status konfirmasi Pembayaran</h4>
    <div class="row">
        <div class="col-5">
            <form action="/dashboard/konfirmasi-pembayaran" method="post"   >
                @csrf
                <div class="form-group">
                    <input type="text" name="pembelian_id" id="" value="{{ $id }}"><br>
            
                    <label for="sp">Status Pembayaran</label>
                    <select class="form-control" name="status" id="sp">
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