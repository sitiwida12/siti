@extends('layout.header')
@section('contents')

    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Purchase</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <div class="container mt-150 mb-150">
        <div class="row justify-content-center">
            {{-- <div class="col-2">
                <ul class="list-group">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                  </ul>
            </div> --}}
            <div class="col-10 ">
                <div class="d-flex align-content-scretch ">
                    <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                        <a class="btn text-light font-weight-bold" style="background-color:orange;" href="/user/purchase/" role="button">Belum Bayar</a>
                        <a class="btn text-light font-weight-bold" style="background-color:orange; " href="/user/purchase/?status_pembayaran=1" role="button">Sudah Bayar</a>
                        <a class="btn text-light font-weight-bold" style="background-color:orange; " href="/user/purchase/?proses_pengiriman=1" role="button">Di Kirim</a>
                        <a class="btn text-light font-weight-bold" style="background-color:orange; " href="/user/purchase/?selesai=1" role="button">Selesai</a>
                        

                    </div>
                </div>
                {{-- <input type="search" name="" id="" class="w-100 my-5" placeholder="Search.."> --}}
                @foreach ($myquery as $bb)
                    
                <div class="d-flex justify-content-between p-2">
                    <div class="detail-produk">
                        <p>{{ $bb->produk->judul_produk }} <br> {{ $bb->kuantitas }}x   </p>
                        
                    </div>
                    {{-- harga satuan --}}
                    <div class="harga-satuan">
                        Rp.{{ $bb->produk->harga }}
                    </div>
                </div>
                <div class="d-flex justify-content-end p-2">
                    
                    <span class="mr-3">Total Harga : </span><h4 class="m3-3">Rp.{{  $bb->total_harga }}</h4>
                </div>
                <div class="d-flex justify-content-between p-2">
                    <div class="waktu-bayar">
                        {{-- Bayar sebelum {{ $bb->waktu_pembayaran }} dengan Indomaret / i.Saku --}}
                        Bayar sebelum {{ $bb->waktu_pembayaran }} dengan {{ $bb->mbayar->jenis_bayar }}
                    </div>
                    <div class="pilihan-aksi">

                        
                        <a class="btn btn-primary btn-sm {{ $display }}" href="#" role="button">Bayar Sekarang</a>
                        
                        
                        
                        <form action="/user/purchase/{{ $bb->id }}" method="post">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm {{ $selesai }}" href="#" role="button">Selesai</button>
                        </form>
                        <a class="btn btn-primary btn-sm {{ $dnilai }}" href="/penilaian/{{ $bb->id }}" role="button">Beri Penilaian</a>
                    </div>
                </div>
                @endforeach
                    

               
            </div>
        </div>
    </div>

@endsection







{{-- 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html> --}}