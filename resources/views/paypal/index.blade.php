<!DOCTYPE html>
<html lang="en">
    <x-head />	
<body>
	<div class="page-wraper">
        <!-- Header -->
		<x-header />
		<!-- Header End -->
		<div class="page-content bg-grey">
			<section class="content-inner-1 border-bottom px-20">
				<div class="container">
					<div class="panel panel-default">
                        <div class="panel-body">
                            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">Make A Payment</h1>
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @php
                                $datos = [
                                    "referencia" => "libro-de-autor-idUser-codigoreferencia",
                                    "amount" => 1
                                ];
                            @endphp
                            
                            <center>
                                <a href="{{ route('make.payment', $datos) }}" class="w-full bg-indigo-500 uppercase rounded-xl font-extrabold text-white px-6 h-8">Pay with PayPal👉</a>
                            </center>
                        </div>
                    </div>
				</div>
			</section>
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