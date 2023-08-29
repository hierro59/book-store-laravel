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
                style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
                <div class="container">
                    <div class="tp-bnr-inr-entry">
                        <h1>Lista de deseos <i class="fa-regular fa-heart text-red-400"></i></h1>
                        <p>Esta es la lista de libros a los que le marcó un corazón</p>
                    </div>
                </div>
            </div>

            <section class="p-10">
                <x-catalog.grid-heart :books="$hearts" :pay="$pay" />
            </section>

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
