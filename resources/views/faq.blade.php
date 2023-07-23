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
        <!-- FAQ Content Start -->
        <section class="main-faq-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 align-self-center mb-4">
                <div class="faq-content-box">
                  <div class="faq-accordion">
                    <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header h-auto" id="headingOne">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false"
                            aria-controls="collapseOne">
                            <span>
                              ¿Cómo puedo publicar una obra?
                            </span> 
                            <span class="icon"><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span></h3>
                        </div>
                        <div id="collapseOne" class="collapse accordion-collapse"
                          aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>
                              Existen dos maneras de como puedes publicar con nosotros. La
                              primera es haciendo
                              una “Auto Publicación” y la segunda es dejándonos a nosotros que
                              nosotros
                              hagamos todo el trabajo con tu manuscrito por medio de nuestros
                              Planes Edición
                              TP. En cualquiera de los casos, solo debe registrarte
                              completamente gratis en
                              nuestra página web siguiendo tres simples pasos.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo"><span>¿Qué es la Auto
                              Publicación?</span> <span class="icon"><i
                                class="fa fa-angle-left" aria-hidden="true"></i></span></h3>
                        </div>
                        <div id="collapseTwo" class="collapse accordion-collapse"
                          aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>
                              Auto publicar una obra, es cuando todo el trabajo de edición lo
                              has hecho tu mismo o contrataste a alguien más para hacerlo. En
                              este caso, puedes enviarnos tu obra editada para que nuestro
                              Consejo Editor la estudie y apruebe; entonces la pondremos
                              disponible en nuestro catálogo y así puedas comercializarla en
                              cualquier lugar del mundo.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingFour">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false"
                            aria-controls="collapseFour"><span>¿Que significa Edición TP?</span>
                            <span class="icon"><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span>
                          </h3>
                        </div>
                        <div id="collapseFour" class="collapse accordion-collapse"
                          aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>La Edición TP o Edición de Textos Prohibidos, es cuando nosotros
                              recibimos tu manuscrito y hacemos todo el trabajo de edición,
                              corrección, promoción y comercialización. Para conocer más sobre
                              como optar por una Edición TP, te invitamos a que visites esta
                              página con toda la información: Planes Edición TP.</p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingFive">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false"
                            aria-controls="collapseFive"><span>¿Cuánto vale una Edición TP?
                            </span> <span class="icon"><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span></h3>
                        </div>
                        <div id="collapseFive" class="collapse accordion-collapse"
                          aria-labelledby="headingFive" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>Optar por una Edición TP es completamente gratuito; solo tiene
                              que registrate en nuestra página web como autor y enviarnos tu
                              manuscrito. El Consejo Editor lo revisará y se pondrá en
                              contacto contigo para el proceso de edición. Para conocer más
                              sobre como optar por una Edición TP, te invitamos a que visites
                              esta página con toda la información: Planes Edición TP.</p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingSix">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false"
                            aria-controls="collapseSix"><span>¿Cuál es el proceso de edición?
                            </span> <span class="icon"><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span></h3>
                        </div>
                        <div id="collapseSix" class="collapse accordion-collapse"
                          aria-labelledby="headingSix" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>El proceso de edición pasa por varias etapas, pero las más
                              importantes son las siguientes:

                              1. Consejo Editor.
                              Luego de que envías el manuscrito de tu obra, el Consejo Editor
                              lo lee y estudia para determinar la viabilidad de su
                              publicación. Si el Consejo Editor lo aprueba, entonces continua
                              su curso cumpliendo las siguiente etapas; de lo contrario, el
                              Consejo Editor podrías ayudarte a corregir los problemas que se
                              puedan presentar para que tu obra finalmente sea publicada.

                              2. Corrección ortográfica y de estilo.
                              Todas nuestras obras son corregidas por profesionales
                              cualificados y en consenso contigo. Serás una parte activa de
                              todo el proceso.

                              3. Maquetación de la obra.
                              Todas nuestras obras son maquetadas y diseñadas por nuestros
                              experimentados maquetadores. Todos ellos tienen una especial
                              sensibilidad a lo gráfico y espacial, pero, sobre todo, todos
                              son excelentes profesionales y buenas personas.

                              4. Diseño de la portada.
                              Todas las cubiertas de nuestras obras son diseñadas con especial
                              atención a las exigencias del autor, pero siempre con mucha
                              sensibilidad y desde el asesoramiento consensuado para llegar al
                              mejor resultado para el libro.

                              5. Gestiones legales.
                              Te ayudaremos y asesoraremos con respecto a todos lo temas
                              legales para preparar tu obra desde el inicio hasta el momento
                              de su lanzamiento.

                              6. Distribución y lanzamiento.
                              Te acompañaremos en el proceso de preparación del lanzamiento
                              oficial de tu obra. Te ayudaremos a preparar todo el material de
                              marketing digital que necesites y programaremos un evento para
                              ese día tan especial de lanzamiento.

                              7. Comercialización.
                              Una vez tu obra sea presentada al mundo y esté disponible en
                              nuestro catálogo, venderlo es tan simple como compartir el link
                              de tu obra por las redes sociales y esperar a que las ganancias
                              crezcan.</p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingSev">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseSev" aria-expanded="false"
                            aria-controls="collapseSev"><span>¿Bajo qué criterios se fija el
                              PVP de la obra?
                            </span> <span class="icon"><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span></h3>
                        </div>
                        <div id="collapseSev" class="collapse accordion-collapse"
                          aria-labelledby="headingSev" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>Está condicionado por todos los actores que intervienen en el
                              proceso de edición y publicación de una obra. En Textos
                              Prohibidos, el PVP lo fijan el autor y el Consejo Editor una vez
                              el libro esté terminado, atendiendo al número de páginas y otras
                              características técnicas.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingEight">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseEight" aria-expanded="false"
                            aria-controls="collapseEight"><span>¿Cómo puedo comprar una obra?
                            </span> <span class="icon"><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span></h3>
                        </div>
                        <div id="collapseEight" class="collapse accordion-collapse"
                          aria-labelledby="headingEight" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>Para comprar una obra en Textos Prohibidos, debes registrarte
                              completamente gratis, escoger la obra que te guste y dar al
                              botón de comprar. Esto te llevará directamente a nuestros medios
                              de pago totalmente seguros. Una vez hagas el pago,
                              automáticamente el sistema te dará acceso a la obra.
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingNine">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseNine" aria-expanded="false"
                            aria-controls="collapseNine"><span>¿Dónde puedo ver las obras que
                              compré?
                            </span> <span class="icon"><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span></h3>
                        </div>
                        <div id="collapseNine" class="collapse accordion-collapse"
                          aria-labelledby="headingNine" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>Todos las obras que adquieras en nuestra plataforma, las podrás
                              descargar las veces que desees con tan solo ingresar a tu
                              Librería Digital en el siguiente enlace: Mis Librería Digital en
                              Textos prohibidos
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingTen">
                          <h3 class="title" data-bs-toggle="collapse"
                            data-bs-target="#collapseTen" aria-expanded="false"
                            aria-controls="collapseTen"><span>¿Cuales son los medios de pago
                              para comprar una obra?
                            </span> <span class="icon"><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span></h3>
                        </div>
                        <div id="collapseTen" class="collapse accordion-collapse"
                          aria-labelledby="headingTen" data-bs-parent="#accordionExample" style="visibility: visible !important">
                          <div class="card-body">
                            <p>Por ahora solo puede comprar una obra a través de nuestro único
                              medio de pago en PayPal. No se te harán cargos adicionales y
                              siempre tendrás control sobre los pagos hechos. Nuestro único
                              medio de pagos es totalmente automatizado y seguro, directamente
                              desde la plataforma TextosProhibidos.shop y no existen gestores
                              o intermediarios. Recuerda siempre proteger tus datos y no
                              confiar en nadie que diga venir en nuestro nombre.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- FAQ Content End -->

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