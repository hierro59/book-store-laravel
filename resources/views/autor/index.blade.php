<!DOCTYPE html>
<html lang="en">
<x-head />	
<body>
	<!-- Replace "test" with your own sandbox Business account app client ID -->
    {{-- <script src="https://www.paypal.com/sdk/js?client-id=AUrmflgExztitevGRKNwzm0CiprxtgTml8QiMzc-sOtUY5e56m3w5iUUVs6lJTP6hcEDudOjoYvhBAW9&currency=USD"></script> --}}
	<div class="page-wraper">
		<!-- Header -->
		<x-header :notifications="$notifications" :avatar="$avatar"/>
		<!-- Header End -->

        <div class="">
            <!-- Section: Design Block -->
            <section class="mb-4 text-center lg:text-left">
              <div class="py-12 md:px-6">
                <div class="container mx-auto xl:px-32">
                  <div class="grid items-center lg:grid-cols-2">
                    <div class="mb-4 md:mb-12 lg:mb-0">
                      <img src="{{ asset($avatar) }}"
                        class="lg:rotate-[6deg] w-full rounded-lg shadow-lg dark:shadow-black/20" alt="image" />
                    </div>
                    <div class="mb-12 md:mt-12 lg:mt-0 lg:mb-0 ">
                      <div
                        class="relative z-[1] block rounded-lg bg-[hsla(0,0%,100%,0.55)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] backdrop-blur-[25px] dark:bg-[hsla(0,0%,5%,0.7)] dark:shadow-black/20 md:px-12 lg:-mr-14">
                        <h2 class="mb-2 text-3xl font-bold text-primary dark:text-primary-400">
                          {{ $autor->name }}
                        </h2>
                        {{-- <p class="mb-4 font-semibold">Graphic designer</p> --}}
                        <p class="mb-6 text-neutral-500 dark:text-neutral-300">
                          {{ $autor->biography }}
                        </p>
                        
                        <ul class="flex justify-center lg:justify-start max-md:grid">
                          @if (isset($facebook))
                          <li>
                            <!-- Facebook -->
                            <a
                                href="{{$facebook}}"
                                target="_BLANK"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                class="mr-4 mb-2 inline-block rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                style="background-color: #1877f2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                </svg>
                            </a>
                          </li>
                          @endif
                            
                          @if (isset($instagram))
                          <li>
                            <!-- instagram -->
                            <a
                                href="{{$instagram}}"
                                target="_BLANK"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                class="mr-4 mb-2 inline-block rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                style="background-color: #c13584">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                          </li>
                          @endif

                          @if (isset($linkedin))
                          <li>
                            <!-- linkedin -->
                            <a
                                href="{{$linkedin}}"
                                target="_BLANK"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                class="mr-4 mb-2 inline-block rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                style="background-color: #0077b5">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                                </svg>
                              </a>
                          </li>
                          @endif

                          @if (isset($youtube))
                          <li>
                            <!-- youtube -->
                            <a
                                href="{{$youtube}}"
                                target="_BLANK"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                class="mr-4 mb-2 inline-block rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                style="background-color: #ff0000">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                </svg>
                              </a>
                          </li>
                          @endif

                          @if (isset($tiktok))
                          <li>
                            <!-- tiktok -->
                            <a
                                href="{{$tiktok}}"
                                target="_BLANK"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                class="mr-4 mb-2 inline-block rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                style="background-color: #6a76ac">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"
                                    class="h-4 w-4">
                                    <path
                                        fill="currentColor"
                                        d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                                </svg>
                              </a>
                          </li>
                          @endif

                          @if (isset($twitter))
                          <li>
                            <!-- twitter -->
                            <a
                                href="{{$twitter}}"
                                target="_BLANK"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                class="mr-4 mb-2 inline-block rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                style="background-color: #1da1f2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                              </a>
                          </li>
                          @endif
                        </ul>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </section>
            <!-- Section: Design Block -->
          </div>


        <x-autor-books :booksRecomendations="$autorbooks" />


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