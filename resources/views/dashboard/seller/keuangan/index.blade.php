@extends('dashboard.seller.layout.header')
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Saldo Saya</h1>
       
    </div>

    <!-- Content Row -->
    <div class="row d-block">
        <div class="mx-3">
            <div class="alert alert-warning" role="alert">
                <h1><span class="text-danger">Rp.</span>  {{ $omset - $dana}}</h1>
              </div>
            
            <button type="button" class="btn btn-warning text-dark" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tarik Dana</button>
            <div class="collapse mt-3" id="collapseExample">
                <form action="" method="post">
                    <div class="card card-body">
                            @csrf
                            <label for="jd">Jumlah Dana</label>
                            <input type="hidden" name="user_id" id="user" value="{{ auth()->user()->id }}">
                            <input type="text" name="jumlah_dana" id="jd">
                            <div class="d-flex">
                                <button type="submit" class="btn btn-success mt-2">Kirim</button>
                    </div>
                </form>
                </div>
              </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="table-responsive mx-3">
            <table id="myTable" class="table datatable">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Jumlah Dana</th>
                         <th>Tanggal Pengajuan</th>
                         <th>Status</th>
                     </tr>
                 </thead>
                 <tbody>
                  @foreach ($uang as $uangs)
                      
                  <tr>
                    {{-- {{ $loop->iteration }} --}}
                      <td>{{ $loop->iteration }}</td>
                      <td>Rp. {{ $uangs->jumlah_dana }}</td>
                      <td>{{date("d-m-Y",strtotime($uangs->tanggal_pengajuan) )  }}</td>
                      <td>
                        @if ($uangs->status)
                        <span class="badge badge-pill badge-success p-2 ">Berhasil</span>
                       
                            
                        @else
                            
                        <span class="badge badge-pill badge-warning p-2 text-dark">Menunggu</span>
                        @endif
                      </td>
                      {{-- <td><a href="/dashboard/pengiriman/{{ $kirim->id }}/edit" class="badge badge-warning">UBAH</a><span class="mx-2">|</span>
                        <form action="/dashboard/pengiriman/" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger text-light" onclick="return confirm('Are you sure?')">HAPUS</button>
                        </form></td> --}}
                  </tr>
                  
                  @endforeach
                 </tbody>
            </table>
        </div>
    </div>

    
</div>
@endsection