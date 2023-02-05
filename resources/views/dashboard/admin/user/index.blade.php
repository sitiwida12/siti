@extends('dashboard.admin.layout.header')
@section('contents')
    {{-- Main Content --}}


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User</h1>
            <a href="/dashboard/user/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i>Tambah User</a>
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
                             <th>Name</th>
                             <th>Username</th>
                             <th>Email</th>
                             <th>Password</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($datauser as $du)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $du->name }}</td>
                             <td>{{ $du->username }}</td>
                             <td>{{ $du->email }}</td>
                             <td>{{ $du->password }}</td>
                             <td><a class="btn btn-primary btn-sm" href="/dashboard/user/{{ $du->id }}/edit" role="button">Edit</a>
                                    <form action="/dashboard/user/{{ $du->id }}" method="post">
                                      @method('delete')
                                      @csrf   
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Hapus</button>
                                </form> 
                            </td>
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
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