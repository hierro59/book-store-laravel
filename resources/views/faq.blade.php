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
		<x-header :notifications="$notifications" />
		<!-- Header End -->
		
		<div class="page-content bg-white">

			<!--banner-->
			<div class="tp-bnr-inr overlay-secondary-dark tp-bnr-inr-sm"
				style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
				<div class="container">
					<div class="tp-bnr-inr-entry">
						<h1>Preguntas frecuentes</h1>
                        <p>Publica Gratis tus textos y comercialízalos en todo el mundo.</p>
					</div>
				</div>
			</div>

            <section class="p-10">


                <section class="mb-32">
                    <h2 class="mb-6 pl-6 text-3xl font-bold">Frequently asked questions</h2>
                
                    <div id="accordionFlushExample">
                      <div class="rounded-none border border-t-0 border-l-0 border-r-0 border-neutral-200">
                        <h2 class="mb-0" id="flush-headingOne">
                          <button
                            class="group relative flex w-full items-center rounded-none border-0 py-4 px-5 text-left text-base font-bold transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                            type="button" data-te-collapse-init data-te-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne">
                            Anim pariatur cliche reprehenderit?
                            <span
                              class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-[#8FAEE0] dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                              </svg>
                            </span>
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="!visible border-0" data-te-collapse-item data-te-collapse-show
                          aria-labelledby="flush-headingOne" data-te-parent="#accordionFlushExample">
                          <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                            put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                            haven't heard of them accusamus labore sustainable VHS.
                          </div>
                        </div>
                      </div>
                      <div class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200">
                        <h2 class="mb-0" id="flush-headingTwo">
                          <button
                            class="group relative flex w-full items-center rounded-none border-0 py-4 px-5 text-left text-base font-bold transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                            type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#flush-collapseTwo"
                            aria-expanded="false" aria-controls="flush-collapseTwo">
                            Non cupidatat skateboard dolor brunch?
                            <span
                              class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-[#8FAEE0] dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                              </svg>
                            </span>
                          </button>
                        </h2>
                        <div id="flush-collapseTwo" class="!visible hidden border-0" data-te-collapse-item
                          aria-labelledby="flush-headingTwo" data-te-parent="#accordionFlushExample">
                          <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                            put a bird on it squid single-origin coffee nulla assumenda
                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                            haven't heard of them accusamus labore sustainable VHS.
                          </div>
                        </div>
                      </div>
                      <div class="rounded-none border border-l-0 border-r-0 border-b-0 border-t-0 border-neutral-200">
                        <h2 class="mb-0" id="flush-headingThree">
                          <button
                            class="group relative flex w-full items-center rounded-none border-0 py-4 px-5 text-left text-base font-bold transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:text-primary-400"
                            type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#flush-collapseThree"
                            aria-expanded="false" aria-controls="flush-collapseThree">
                            Praesentium voluptatibus temporibus consequatur non aspernatur?
                            <span
                              class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-[#8FAEE0] dark:group-[[data-te-collapse-collapsed]]:fill-[#eee]">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                  d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                              </svg>
                            </span>
                          </button>
                        </h2>
                        <div id="flush-collapseThree" class="!visible hidden rounded-b-lg" data-te-collapse-item
                          aria-labelledby="flush-headingThree" data-te-parent="#accordionFlushExample">
                          <div class="py-4 px-5 text-neutral-500 dark:text-neutral-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit
                            optio vitae inventore autem fugiat rerum sed laborum. Natus
                            recusandae laboriosam quos pariatur corrupti id dignissimos
                            deserunt, praesentium voluptatibus temporibus consequatur non
                            aspernatur laborum rerum nemo dolorem libero inventore provident
                            exercitationem sunt totam aperiam. Facere sunt quos commodi
                            obcaecati temporibus alias amet! Quam quisquam laboriosam quae
                            repellendus non cum adipisci odio?
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
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