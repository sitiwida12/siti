<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Jrahi Mart | Payment</title>
</head>
<body style=" background: rgb(255,137,0);
background: linear-gradient(180deg, rgba(255,137,0,1) 0%, rgba(255,85,0,1) 100%); ">
    <div class="container" style="width: 40em; background-color:white;">
        <div class="row justify-content-center">
            <div class="col">

                <table class="table table-responsive my-4">
                    <tr>
                        <td>Total Pembayaran</td>
                        <td>Rp {{ $paym->total_harga }}</td>
                    </tr>
                    <tr>
                        <td>Pembayaran dalam</td>
                        <td><span  id="countdown"> 23 jam 29 menit 58 detik</span> <br>
                            Jatuh tempo 
                           {{ date('d M Y, H:i', strtotime($paym->waktu_pembayaran . "1 days"))}}
                           {{-- {{ date('d M Y, H:i') }} --}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="kodepembayaran my-5">
            <div class="container">

                <div class="row justify-content-center">
    
                    @if ($paym->mbayar_id == 1)
                    <div class="kode-brand col-auto">
                        <img src="{{ asset('assets/images/lbri.png') }}" alt="" srcset="" width="160px">
                     </div>
                    @else

                    <div class="kode-brand col-auto">
                       <img src="{{ asset('assets/images/rekbercode.jpeg') }}" alt="" srcset="" width="160px" height="160px">
                    </div>





                    @endif










        
                    <div class="alert alert-secondary col" role="alert">
                        <div class="row">
                            <h6 class="fw-bold">Kode Pembayaran</h6>
                        </div>
                        <div class="row">
                            <h4>{{ $paym->invoice }}</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
            {{-- Petunju Pembayaran --}}
        <div class="container">
      
                <div class="card card-body">
                    @if ($paym->mbayar_id == 1)
                    
                <ol>
                    <li>Buka aplikasi BRI Mobile</li>
                    <li>Pilih menu Transfer</li>
                    <li>Klik Tambah Daftar Baru</li>
                    <li>Pilih Bank BRI</li>
                    <li>Masukan nomor rekening {{ $paym->mbayar->rekening }}</li>
                    <li>Masukan nominal transfer sebesar {{ $paym->total_harga }} dan tulis pesan sesuai kode pembayaran
                        agar konfirmasi pembayaran bisa dikonfirmasi dengan cepat</li>
                  
                </ol>
                @else
                <ol>
                    <li>Scan QRCode dengan QRIS</li>
                    <li>tulis nominal transfer sebesar {{ $paym->total_harga }} dan tulis pesan sesuai kode pembayaran
                        agar konfirmasi pembayaran bisa dikonfirmasi dengan cepat</li>
                    <li>Setelah transaksi berhasil, kamu akan mendapatkan bukti pembayaran. Mohon simpan bukti
                        pembayaran sebagai jaminan apabila diperlukan verifikasi lebih lanjut.</li>
                    <li>Pesanan kamu akan terverifikasi secara otomatis dalam aplikasi Jrahi Market setelah pembayaran
                        berhasil.</li>
                </ol>
                    
                @endif
                </div>
         
        </div>
          
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{ date('M j, Y H:i:s', strtotime($paym->waktu_pembayaran . "1 days")) }}").getTime();


        // var countDownDate = new Date("Sep 29, 2022 13:10:09").getTime();
        // console.log(countDownDate);
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
            // console.log(now);
            // console.log(countDownDate);
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            // console.log(distance);
           
            
          // Time calculations for days, hours, minutes and seconds
        //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            

            // console.log(hours);

          // Output the result in an element with id="demo"
          document.getElementById("countdown").innerHTML = hours + " jam "
          + minutes + " menit " + seconds + " detik ";

            
        
        //   console.log(document.getElementById("countdown"));
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
            document.getElementById("countdown").classList.add("text-danger");
          }
        }, 1000);



        // $("countdown").html("haha");
    </script>
</body>
</html>