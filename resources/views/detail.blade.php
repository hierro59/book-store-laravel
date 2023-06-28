<!DOCTYPE html>
<html lang="en">
<x-head />	
<body>
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
		<x-header />
		<!-- Header End -->
		
        <x-home.book-detail :book="$data" :books="$books" />

		
		
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