@extends('dashboard.admin.layout.header')
@section('contents')
    {{-- Main Content --}}


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Pembayaran</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

        </div>

        <!-- Content Row -->

        <div class="row">
            <div class="table-responsive">

                <table id="myTable" class="table datatable">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Invoice</th>
                             <th>Kuantitas</th>
                             <th>Status Pembayaran</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($spembayaran as $sp)
                        {{-- @foreach ($spengiriman as $spe) --}}
                            
                      
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sp->invoice }}</td>
                                <td>{{ $sp->kuantitas }}</td>
                                <td>@if ($sp->status_pembayaran==null)
                                    <span class="badge badge-danger">UNPAID</span>
                                @else
                                    <span class="badge badge-success">PAID</span>
                                @endif
                                    
                                    </td>
                                <td><a class="btn btn-warning" href="/dashboard/konfirmasi-pembayaran/{{ $sp->id }}/edit" role="button">Ubah</a>
                                    <button class="btn btn-danger">Hapus</button></td>
                            </tr>
                        @endforeach
                        {{-- @endforeach --}}
                     </tbody>
                </table>
            </div>
        </div>

        
    </div>
    <!-- /.container-fluid -->

</div>
{{-- End of Main Content --}}
@endsection