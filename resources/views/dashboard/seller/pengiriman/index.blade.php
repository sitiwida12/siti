@extends('dashboard.seller.layout.header')
@section('contents')
    {{-- Main Content --}}


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengiriman</h1>
            
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
                             <th >No</th>
                             <th>Invoice</th>
                             <th>Kuantitas</th>
                             <th>Total Harga</th>
                             <th>Alamat</th>
                             <th>Status Pembayaran</th>
                             <th>Status Pengiriman</th>
                             <th>Selesai</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                      @foreach ($dikirim as $kirim)
                          
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $kirim->invoice }}</td>
                          <td>{{ $kirim->kuantitas }}</td>
                          <td>Rp.{{ $kirim->total_harga }}</td>
                          <td>{{  $kirim->tujuan_kota }}</td>
                          <td>
                            @if ($kirim->status_pembayaran==null)
                                <span class="badge badge-pill badge-danger">UNPAID</span>
                            @else
                                <span class="badge badge-pill badge-success">PAID</span>
                            @endif
                          </td>
                          <td>
                            @if ($kirim->proses_pengiriman==null)
                                <span class="badge badge-pill badge-danger">Belum Dikirim</span>
                            @else
                                <span class="badge badge-pill badge-success">Sudaah Dikirim</span>
                            @endif
                          </td>
                          <td>
                            @if ($kirim->selesai==null)
                            <span class="badge badge-pill badge-danger">Belum Selesai</span>
                        @else
                            <span class="badge badge-pill badge-success">Selesai</span>
                        @endif
                          </td>
                          <td><a href="/dashboard/pengiriman/{{ $kirim->id }}/edit" class="badge badge-warning">UBAH</a><span class="mx-2">|</span>
                            <form action="/dashboard/pengiriman/" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button class="badge bg-danger text-light border-0" onclick="return confirm('Are you sure?')">HAPUS</button>
                            </form></td>
                      </tr>
                      
                      @endforeach
                     </tbody>
                </table>
            </div>
        </div>

        
    </div>
    <!-- /.container-fluid -->

</div>
{{-- End of Main Content --}}
@endsection

@section('setjs')
{{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
{{-- <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

<script>
    const dataTable = new simpleDatatables.DataTable("#myTable", {
	
	fixedHeight: true,
})
</script>
@endsection