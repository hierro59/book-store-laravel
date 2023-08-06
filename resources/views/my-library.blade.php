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
        <x-header :notifications="$notifications" :avatar="$avatarProfile" />
        <!-- Header End -->

        <div class="page-content bg-white">

            <!--banner-->
            <div class="tp-bnr-inr overlay-secondary-dark tp-bnr-inr-sm"
                style="background-image:url({{ asset('assets/images/background/bgLibrary.webp') }});">
                <div class="container">
                    <div class="tp-bnr-inr-entry">
                        <h1>Mi Biblioteca Digital</h1>
                        <p>Tu colección personal de libros.</p>
                    </div>
                </div>
            </div>

            <section class="p-10">
                @if (count($books) <= 0)
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('catalog') }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ops! Aún no
                                tiene nada.</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Descubra la magia de los textos
                            prohibidos en nuestro catálogo.</p>
                        <a href="{{ route('catalog') }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Descubre
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                @endif
                <x-my-library.grid :books="$books" />
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
                                        nos aseguramos de cumplir con todos los estándares para mantener tus datos y
                                        activos, siempre a salvo.
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
                                    <p class="font-20">Nuestras libros</p>
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
