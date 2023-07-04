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
		
		<div class="page-content bg-white">

			<!--banner-->
			<div class="tp-bnr-inr overlay-secondary-dark tp-bnr-inr-sm"
				style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
				<div class="container">
					<div class="tp-bnr-inr-entry">
						<h1>Publica con Nosotros</h1>
                        <p>Publica Gratis tus textos y comercialízalos en todo el mundo.</p>
					</div>
				</div>
			</div>

            <section class="p-10">
                
                <ol class="items-center sm:flex">
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div class="z-10 flex items-center justify-center w-24 h-24 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                <span class="text-5xl font-bold text-blue-600">1</span>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                        </div>
                        <div class="mt-3 sm:pr-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Regístrate gratis</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                Registrarte es muy fácil y completamente gratis. 
                                Has clic <a class="text-blue-300" href="{{ route('register') }}">aquí para ir al formulario de registro</a>; 
                                coloca tu nombre, correo, una contraseña y selecciona la opción de <b>“Autor”</b>. 
                                Una vez seas parte de nuestro equipo, podrás subir tus obras a nuestra plataforma.
                            </p>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div class="z-10 flex items-center justify-center w-24 h-24 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                <span class="text-5xl font-bold text-blue-600">2</span>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                        </div>
                        <div class="mt-3 sm:pr-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sube tus manuscritos</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                Una vez seas parte de nuestro equipo, podrás subir tus obras a nuestra plataforma. 
                                En tu Panel Personal tendrás la opción de administrar, 
                                subir y editar tus obras. Una vez subas un manuscrito, 
                                nuestro Comité Editorial hará la revisión de tu obra y te contactará.
                            </p>
                        </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                        <div class="flex items-center">
                            <div class="z-10 flex items-center justify-center w-24 h-24 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                <span class="text-5xl font-bold text-blue-600">3</span>
                            </div>
                            <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                        </div>
                        <div class="mt-3 sm:pr-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Comparte y vende</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                En nuestra plataforma es muy sencillo compartir tus obras con el mundo entero. 
                                Luego de que el Comité Editorial apruebe tu obra, 
                                estará disponible en el catálogo de nuestra página web, 
                                donde será accesible al mundo entero y cualquiera lo podrá comprar.
                            </p>
                        </div>
                    </li>
                </ol>
                <div class="mt-24">
                    <iframe class="w-full h-96" src="https://www.youtube.com/embed/EyvQejm3MTU?controls=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </section>

            <section class="content-inner-1 bg-light">
				<div class="container">
					<div class="section-head text-center">
						<h2 class="title">Nuestra visión</h2>
						<p>
                            En Textos Prohibidos, creemos en la
                            libertad de expresión y en el poder de las palabras para desafiar las normas
                            establecidas. Únete a nosotros y adéntrate en un viaje literario donde las
                            fronteras se desvanecen y las ideas encuentran su voz.
                        </p>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="icon-bx-wraper style-3 m-b30">
								<div class="icon-lg m-b20">
									<i class="flaticon-open-book-1 icon-cell"></i>
								</div>
								<div class="icon-content">
									<h4 class="text-2xl font-bold">Mejor librería virtual</h4>
									<p>
                                        Nuestro catálogo es moderno y sencillo, 
                                        permitiendo una vista fresca y agradable para todo el mundo. 
                                        Navegar, buscar y acceder a nuestros títulos, 
                                        es una experiencia extrasensorial, 
                                        que ayuda a los lectores a escoger de entre los mejores.
                                    </p>
									{{-- <a href="about-us.html">Learn More <i class="fa-solid fa-angles-right"></i></a> --}}
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="icon-bx-wraper style-3 m-b30">
								<div class="icon-lg m-b20">
									<i class="flaticon-exclusive icon-cell"></i>
								</div>
								<div class="icon-content">
									<h4 class="text-2xl font-bold">Vendedor de confianza</h4>
									<p>
                                        Nuestros clientes confían en nosotros para comercializar sus obras. 
                                        Las personas que nos prefieren, 
                                        saben que nuestras ediciones son de alta calidad y por lo tanto, 
                                        pueden obtener los mejor de mejor con nosotros y siempre estarán satisfechos.
                                    </p>
									{{-- <a href="about-us.html">Learn More <i class="fa-solid fa-angles-right"></i></a> --}}
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12">
							<div class="icon-bx-wraper style-3 m-b30">
								<div class="icon-lg m-b20">
									<i class="flaticon-store icon-cell"></i>
								</div>
								<div class="icon-content">
									<h4 class="text-2xl font-bold">Tienda virtual certificada</h4>
									<p>
                                        Utilizamos lo último en tecnología y seguridad informática. 
                                        Somo muy cuidadosos con nuestros activos. 
                                        Por medio de encriptación de última generación, 
                                        nos aseguramos de cumplir con todos los estándares para mantener tus datos y activos, siempre a salvo.
                                    </p>
									{{-- <a href="about-us.html">Learn More <i class="fa-solid fa-angles-right"></i></a> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			
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