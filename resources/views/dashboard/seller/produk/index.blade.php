@extends('dashboard.seller.layout.header')
@section('contents')
    {{-- Main Content --}}


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produk Saya</h1>
        </div>

        <!-- Content Row -->
    
        @if (session()->has('success'))
            <div class="alert alert-{{ session('warna') }}" role="alert">
                {{ session('success') }}
            </div>
        @endif
      

        <!-- Content Row -->

      

            <div class="table-responsive ">
                <table id="myTable" class="table datatable">
                     <thead>
                         <tr>
                             <th >No</th>
                             <th>Judul Produk</th>
                             <th>Harga</th>
                             <th>Stok</th>
                             <th>Deskripsi Produk</th>
                             <th>Images</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->judul_produk }}</td>
                            <td>Rp. {{ $dt->harga }}</td>
                            <td>{{ $dt->stock }}</td>
                            <td>{!! Str::limit($dt->deskripsi_produk, 50, '...')  !!}</td>
                            <td><img style="width: 80px" src="{{ asset('storage/'.Str::remove('public/', $dt->images1)) }}" alt="" srcset=""></td>
                            <td><a href="/dashboard/produk/{{ $dt->id }}/edit" class="badge badge-warning">UBAH</a><span class="mx-2"></span><form action="/dashboard/produk/{{ $dt->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger text-light border-0" onclick="return confirm('Are you sure?')">HAPUS</button>
                               
                            </form>
                            </td>
                        </tr>
                        @endforeach
                     </tbody>
                </table>
            </div>
       
       

        
    </div>
    <!-- /.container-fluid -->

{{-- </div> --}}
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