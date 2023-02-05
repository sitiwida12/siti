@extends('layout.header')
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table" id="nilai">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Gambar Produk</th>
									<th class="product-name">Nama Produk</th>
									<th class="product-price">Harga</th>
									<th class="product-quantity">Quantitas</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach ($wishlist as $wl)
							
								<tr class="table-body-row" >
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i>{{ $i++ }}</a></td>
									<td class="product-image"><img src="assets/img/products/product-img-1.jpg" alt=""></td>
									<td class="product-name">{{ $wl->produk->judul_produk }}</td>
									<td class="product-price">Rp. {{number_format($wl->produk->harga,0,',','.')}} </td>
									<td class="product-quantity"><input type="number" placeholder="0" value="{{ $wl->kuantitas }}"></td>
									<td class="product-total">Rp. {{number_format( $wl->produk->harga*$wl->kuantitas,0,',','.' )}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td id="hasil">$500</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>$45</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$545</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart.html" class="boxed-btn">Update Cart</a>
							<a href="checkout.html" class="boxed-btn black">Check Out</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->



@section('myscript')
	
<script>
	$(document).ready(function () {
		
		var table = document.getElementById("nilai"), sumHsl = 0;
		console.log(table.rows);
		
		for(var t = 1; t < table.rows.length; t++)
		{
			sumHsl = sumHsl + parseInt(table.rows[t].cells[5].innerHTML.replaceAll('Rp. ','').replaceAll('.',''));
		}

		// console.log(sumHsl);
		$("#hasil").html(toRupiah(sumHsl));
		
	});
</script>
@endsection
