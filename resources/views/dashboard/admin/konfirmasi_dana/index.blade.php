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
                             <th>Nama</th>
                             <th>Jumlah Dana</th>
                             <th>Status</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($pencairan as $cair)
                       
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cair->user->name }}</td>
                                <td>{{ $cair->jumlah_dana }}</td>
                                <td>
                                        @if ($cair->status==null)
                                            <span class="badge badge-danger">Menunggu</span>
                                        @else
                                            <span class="badge badge-success">Berhasil</span>
                                        @endif   
                                </td>
                                <td>
                                    <form action="/dashboard/konfirmasi-tarik-dana/{{ $cair->id }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="text" name="id" value="{{ $cair->id }}">
                                        <input type="text" name="status" value="1">
                                        <button type="submit" class="btn btn-success btn-sm">Sudah</button>
                                    </form>
                                </td>
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