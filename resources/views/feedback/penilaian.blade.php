@extends('layout.header')
@section('contents')
	
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					
					<h1>Penilaian</h1>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- <div class="container-fluid mb-4" style="margin-top: 10em; background-color:grey; heig">
		<h2 class="text-center">Penilaian</h2>
</div> --}}

<div class="container my-4 ">

		<h4>Pembelian</h4>

		<div class="border p-3 mb-5">

			<div class="mb-3">
				<div class="row">
					<div class="col-1">
						<img src="" alt="">
						
					</div>
					<div class="col-11">
						<h5 class="font-weight-light">{{ $produk->produk->judul_produk }}</h5>
						<p>{{ $produk->kuantitas }}x</p>
					</div>
				</div>
				
			</div>
		
			<p class="font-weight-bold">Total Harga : <span style="font-size:150%;">Rp.{{ $produk->total_harga }}</span> </p>
		
		</div>
		<form action="" method="post">
			@csrf
			<input type="hidden" name="produk_id" value="{{ $produk->produk_id }}">
			<input type="hidden" name="pembelian_id" value="{{ $produk->id }}">
			<textarea name="penilaian" rows="6" class="form-control mb-3" placeholder="Leave a comment here"></textarea>
			<button type="submit" class="btn btn-primary">Nilai</button>
		</form>
		
</div>

@endsection