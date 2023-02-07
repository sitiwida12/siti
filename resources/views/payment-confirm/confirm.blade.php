@extends('layout.header')
@section('contents')

    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Payment Confirmation</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

    <div class="container mt-5 mb-150">
      <form action="/payment-confirm" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="pembelian_id" value="{{ $myid }}" hidden><br>
        <label for="pconfirm_pic">Upload Bukti Pembayaran</label><br>
        <input type="file" name="images"><br>
        <button type="submit" class="my-3">Kirim</button>

      </form>
    </div>

@endsection







{{-- 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html> --}}