@extends('dashboard.admin.layout.header')
@section('contents')
    {{-- Main Content --}}


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
       

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Form Edit User</h1>

                <form action="/dashboard/user/{{$user->id}}" method="post">
                    @method('put')
                    @csrf
                  
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Form Edit User</button>
            </div>
      

        <!-- Content Row -->
        <div class="row">
            
                <div class="row">
                    <div class="col">
                       

                        <input type="text" name="status"  value="{{ $user->status }}">
                        <label for="name">Nama</label><br>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"><br>
                        
                        <label for="username">Username</label><br>
                        <input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}"> <br>
                        

                        <label for="password">Password</label><br>
                        <input type="password" class="form-control" name="password" id="password"> <br>
                        


                        <label for="gender">Gender</label><br>
                        <select name="gender" id="gender" class="form-control" >
                            <option value="">Select Gender</option>
                            <option value="Male" @if ( $user->gender=='Male' ) selected   @endif>Male</option>
                            <option value="Female" @if ( $user->gender=='Female' )  selected   @endif>Female</option>
                        </select><br>

                        <label for="tgl_lahir">Tanggal Lahir</label><br>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ $user->tgl_lahir }}"><br>
                        
                       
                        <label for="email">Email</label><br>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"><br>

                        <label for="no_telp">Nomor Telephone</label><br>
                        <input type="text"  class="form-control" name="no_telp" id="no_telp" value="{{ $user->no_telp }}"><br>

                        <label for="no_rekening">Nomor Rekening</label><br>
                        <input type="text" class="form-control" name="no_rekening" id="no_rekening" value="{{ $user->no_rekening }}"><br>
                        </div>

                    <div class="col">

                        <label for="kecamatan">Kecamatan</label><br>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="{{ $user->kecamatan }}"><br>
                        
                        <label for="kota">Kota</label><br>
                        <input type="text" class="form-control" name="kota" id="kota" value="{{ $user->kota }}"><br>
                        
                        <label for="kode_pos">Kode Pos</label><br>
                        <input type="number" class="form-control" name="kode_pos" id="kode_pos"  value="{{ $user->kode_pos }}"><br>
                        
                        <label for="alamat">Alamat Lengkap</label><br>

                        <textarea name="alamat" id="alamat" class="form-control">{{ $user->alamat }}</textarea><br>

                    </div>
                
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