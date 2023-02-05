
	<!-- logo carousel -->
	{{-- <div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Jrahi Market ini adalah sebuah platform digital market yang terbatas hanya pada desa Jrahi meliputi batasan produk yang paling sering diproduksi di daerah Jrahi</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>Desa Jrahi, Kecamatan Gunungwungkal Kabupaten Pati</li>
							{{-- <li>support@fruitkha.com</li> --}}
							{{-- <li>+00 111 222 3333</li> --}}
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="/">Home</a></li>
							<li><a href="/about">About</a></li>
							<li><a href="/user/purchase">Shop</a></li>
							{{-- <li><a href="news.html">News</a></li> --}}
							<li><a href="/contact">Contact</a></li>
						</ul>
					</div>
				</div>
				{{-- <div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div> --}}
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; {{ now()->year }},  All Rights Reserved.<br>
						
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	
	
	<!-- jquery -->
	{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
	<script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
	<!-- bootstrap -->

	<script src="	{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- count down -->
	<script src="{{ asset('/assets/js/jquery.countdown.js') }}assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="{{ asset('/assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
	<!-- waypoints -->
	<script src="{{ asset('/assets/js/waypoints.js') }}"></script>
	<!-- owl carousel -->
	
	<script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
	<!-- magnific popup -->
	<script src="{{ asset('/assets/js/jquery.magnific-popup.min.js') }}"></script>
	<!-- mean menu -->
	<script src="{{ asset('/assets/js/jquery.meanmenu.min.js') }}"></script>
	<!-- sticker js -->
	
	<script src="{{ asset('/assets/js/sticker.js') }}"></script>
	<!-- main js -->
	<script src="{{ asset('/assets/js/main.js') }}"></script>

	<script src="https://unpkg.com/@develoka/angka-rupiah-js/index.min.js"></script>
	@yield('myscript')



	<script>
		$(document).ready(function(){
			$("#dropdownMenuLink").hover(function(){
				$('#menu-user').addClass('d-block');
				}, 
				function(){
				$('#menu-user').removeClass("d-block");
				$('#menu-user').addClass("d-none");
				}
			);

			$("#menu-user").hover(function(){
				$(this).addClass('d-block');
				}, 
				function(){
				$(this).removeClass("d-block");
				$(this).addClass("d-none");
				}
			);

			// $('#menu li a').click(function () { 
			// 	$(this).parent().addClass('current-list-item').siblings().removeClass('current-list-item');
				
			// });

			
		});
	</script>
	
</body>
</html>