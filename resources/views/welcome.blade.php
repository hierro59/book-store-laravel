<!DOCTYPE html>
<html lang="en">
<x-head />	
<body>
	<!-- Replace "test" with your own sandbox Business account app client ID -->
    {{-- <script src="https://www.paypal.com/sdk/js?client-id=AUrmflgExztitevGRKNwzm0CiprxtgTml8QiMzc-sOtUY5e56m3w5iUUVs6lJTP6hcEDudOjoYvhBAW9&currency=USD"></script> --}}
	<div class="page-wraper">
		<!-- <div id="loading-area" class="preloader-wrapper-1">
			<div class="preloader-inner">
				<div class="preloader-shade"></div>
				<div class="preloader-wrap"></div>
				<div class="preloader-wrap wrap2"></div>
				<div class="preloader-wrap wrap3"></div>
				<div class="preloader-wrap wrap4"></div>
				<div class="preloader-wrap wrap5"></div>
			</div> 
		</div> -->
	
		<!-- Header -->
		<x-header :notifications="$notifications"/>
		<!-- Header End -->
		
		<div class="page-content bg-white">
			<!--Swiper Banner Start -->
			<x-home.swiper-banner :booksBanner="$booksBanner" />
			<!--Swiper Banner End-->
			
			<x-home.recomendations :booksRecomendations="$booksRecomendations"/>
			
			<!-- icon-box1 -->
			<section class="content-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
							<div class="icon-bx-wraper style-1 m-b30 text-center">
								<div class="icon-bx-sm m-b10"> 
									<i class="flaticon-shield icon-cell"></i>
								</div>
								<div class="icon-content">
									<h5 class="tp-title m-b10">Pago seguro</h5>
									<p>Compra títulos impresionantes de la forma más segura con lo último en tecnología y seguridad informática.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
							<div class="icon-bx-wraper style-1 m-b30 text-center">
								<div class="icon-bx-sm m-b10"> 
									<i class="flaticon-like icon-cell"></i>
								</div>
								<div class="icon-content">
									<h5 class="tp-title m-b10">Mejor calidad</h5>
									<p>Ediciones de gran calidad y realizadas para satisfacer las necesidades de nuestra exclusiva audiencia.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
							<div class="icon-bx-wraper style-1 m-b30 text-center">
								<div class="icon-bx-sm m-b10"> 
									<i class="flaticon-star icon-cell"></i>
								</div>
								<div class="icon-content">
									<h5 class="tp-title m-b10">Satisfacción</h5>
									<p>Únete a nuestra comunidad para tener acceso a los beneficios de ser un autor o lector <i>Premium</i>.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- icon-box1 End-->
			
			<!-- Book Sale -->
			<x-home.book-sale :booksSales="$booksSales"/>
			<!-- Book Sale End -->
			
			<!-- Special Offer-->
			<x-home.offers :offers="$offers"/>
			<!-- Special Offer End -->

			<!-- Feature Box -->
			<section class="content-inner">
				<div class="container">
					<div class="row sp15">
						<div class="col-lg-4 col-md-6 col-sm-6 col-6 wow fadeInUp" data-wow-delay="0.1s">
							<div class="icon-bx-wraper style-2 m-b30 text-center">
								<div class="icon-bx-lg">
									<i class="fa-solid fa-users icon-cell"></i>
								</div>
								<div class="icon-content">
									<h2 class="tp-title counter m-b0">{{ $counters['customers'] }}</h2>
									<p class="font-20">Clientes felices</p>
								</div>
							</div>
						</div>
						<div class=" col-lg-4 col-md-6 col-sm-6 col-6 wow fadeInUp" data-wow-delay="0.2s">
							<div class="icon-bx-wraper style-2 m-b30 text-center">
								<div class="icon-bx-lg"> 
									<i class="fa-solid fa-book icon-cell"></i>
								</div>
								<div class="icon-content">
									<h2 class="tp-title counter m-b0">{{ $counters['books'] }}</h2>
									<p class="font-20">Nuestros libros</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-6 wow fadeInUp" data-wow-delay="0.4s">
							<div class="icon-bx-wraper style-2 m-b30 text-center">
								<div class="icon-bx-lg"> 
									<i class="fa-solid fa-leaf icon-cell"></i>
								</div>
								<div class="icon-content">
									<h2 class="tp-title counter m-b0">{{ $counters['autors'] }}</h2>
									<p class="font-20">Escritores destacados</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Feature Box End -->
		</div>
		<!-- Footer -->
		<x-footer />
		<!-- Footer End -->
		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
	</div>
	
	<!-- Scripts -->
	<x-scripts />
	<!-- Scripts end -->
</body>
</html>