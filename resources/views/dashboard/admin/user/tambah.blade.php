@extends('dashboard.admin.layout.header')
@section('contents')
    {{-- Main Content --}}


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
       

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Form Tambah User</h1>

                <form action="/dashboard/user" method="post">
                <button type="submit"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Form Tambah User</button>
            </div>
      

        <!-- Content Row -->
       
       
                <div class="row">
                    <div class="col">
                        @csrf

                        <label for="">Nama</label><br>
                        <input type="text" class="form-control" name="name" id=""><br>

                        <label for="">Username</label><br>
                        <input type="text" class="form-control" name="username" id=""><br>
                        

                        <label for="">Password</label><br>
                        <input type="password" class="form-control" name="password" id=""><br>


                        <label for="">Gender</label><br>
                        <select name="gender" id="" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select><br>

                        <label for="">Tanggal Lahir</label><br>
                        <input type="date"  name="tgl_lahir" id="" class="form-control"><br>
                        
                       
                        <label for="">Email</label><br>
                        <input type="email" class="form-control" name="email" id=""><br>

                        <label for="">Nomor Telephone</label><br>
                        <input type="text"  class="form-control" name="no_telp" id=""><br>

                        <label for="">Nomor Rekening</label><br>
                        <input type="text" class="form-control" name="no_rekening" id=""><br>
                        </div>
                    <div class="col">
                        <label for="">Kecamatan</label><br>
                        <input type="text" class="form-control" name="kecamatan" id=""><br>
                        <label for="">Kota</label><br>
                        <input type="text" class="form-control" name="kota" id=""><br>
                        <label for="">Kode Pos</label><br>
                        <input type="number" class="form-control" name="kode_pos" id=""><br>
                        <label for="">Alamat Lengkap</label><br>

                        <textarea name="alamat" id=""class="form-control"></textarea><br>
                    </div>
                </form>
                </div>
                 
       
      

        <!-- Content Row -->

        <div class="row">
           
        </div>

        
    </div>
    <!-- /.container-fluid -->

</div>
{{-- End of Main Content --}}
@endsection

@section('setjs')

@endsection