<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register</title>
    <style>
        .form-control{
            background-color: rgb(218, 101, 5);
            border: none;
        }
        .container{
            width: auto;
            height: auto;
           
            box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
            
        }
        body{

            background-image: url('https://htmlcolorcodes.com/assets/images/colors/orange-color-solid-background-1920x1080.png');
        }
    </style>
</head>
<body>
    




        <div class="container my-3 p-3">
        <h2 class="mt-3">Register</h2>
     
            <form action="/register"  method="post">
                @csrf
                    <div class="row">
        
                        <div class="col-4">
                            <label for=""  class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="" required><br>
                            <label for=""  class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id=""required><br>
                            <label for=""  class="form-label">Password</label>
                            <input type="password" class="form-control"  name="password" id=""required><br>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label for="name"  class="form-label">Full Name</label>
                                    <input id="name" name="name"  class="form-control" type="text" AUTOCOMPLETE=OFF required/><br>
                                
                                
                                    <label for=""  class="form-label">Gender</label>
                                    
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option selected value="">Select Your Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        
                                    </select><br>
                                
                                
                                
                                    <label for="phone"  class="form-label">Phone</label>
                                    <input id="phone" class="form-control" name="no_telp" placeholder="+6281325675595" type="tel" AUTOCOMPLETE=OFF required /><br>
                                
                                
                                    
                                    <label for=""  class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" id=""required><br>
                                
                                </div>
                                <div class="col">

                                    <label for=""  class="form-label">No Rekening</label>
                                    <input type="text" class="form-control" name="no_rekening" id=""required><br>
                                
                                    <label for=""  class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id=""required><br>
                                
                                
                                    <label for=""  class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan" id=""required><br>
                                
                                
                                    <label for=""  class="form-label">Kota</label>
                                    {{-- <input type="text" class="form-control" name="kota" id=""required><br> --}}
                                    {{-- <input type="text" class="form-control" name="kota_id" id=""required> --}}
                                    <select class="form-control" name="kota_id" required>
                                        @foreach ($kota as $results)
                                            
                                        <option value="{{ $results['city_id'] }}">{{ $results['city_name'] }}</option>
                                            
                                        @endforeach
                                      
                                      </select><br>
                                
                                
                                    <label for=""  class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" name="kode_pos" id=""required><br>
                            
                                </div>
                            </div>
                            <!-- <h4>Personal Detail</h4> -->
                            
                            
                
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Register</button>
                </div>

            </form>
       


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $.ajax{
            
        }
    </script>
</body>
</html>