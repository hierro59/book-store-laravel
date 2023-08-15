@props(['booksBanner'])
<style>
    .radial-gradient {
        background: radial-gradient(at 0% 80%, rgb(128, 0, 128) 40%, #80008000 100%);
        height: 100vh;
    }
</style>
<div class="main-slider style-1 slider-white">
    <div class="main-swiper">
        <div class="swiper-wrapper" style="height: 100vh">
            @foreach ($booksBanner as $book)
                <div class="swiper-slide bg-light max-md:pt-24"
                    style="background-image: url({{ asset('thumbnail/covers/' . $book['portada']) }});">
                    <div class="container radial-gradient">
                        <div class="banner-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="swiper-content">
                                        <div class="content-info" style="padding-left: 10%">
                                            <h6 class="text-neutral-50 tracking-widest" data-swiper-parallax="-10">BEST
                                                MANAGEMENT </h6>
                                            <h1 class="title mb-0 text-white" data-swiper-parallax="-20">
                                                {{ $book['name'] }}</h1>
                                            <ul class="tp-tags" data-swiper-parallax="-30">
                                                <li><a
                                                        class="text-white"href="javascript:void(0);">{{ $book['autor'] }}</a>
                                                </li>
                                                <li><a class="text-white"
                                                        href="javascript:void(0);">{{ $book['categoria'] }}</a></li>
                                                <li><a class="text-white"
                                                        href="javascript:void(0);">{{ $book['year'] }}</a></li>
                                            </ul>
                                            <p class="text mb-0 text-white" data-swiper-parallax="-40">
                                                {{ $book['detail'] }}</p>
                                            <div class="price" data-swiper-parallax="-50">
                                                @if ($book['price'] == '0.00')
                                                    <span class="price-num text-white">GRATIS</span>
                                                @else
                                                    <span class="price-num text-white">${{ $book['sale'] }}</span>
                                                @endif
                                                @if ($book['discount'])
                                                    <del>${{ $book['price'] }}</del>
                                                    <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                                @endif
                                            </div>
                                            <div class="content-btn" data-swiper-parallax="-60">
                                                @if ($book['price'] == '0.00')
                                                    @auth
                                                        <a class="btn btn-primary btnhover"
                                                            href="{{ asset($book['file_path']) }}"
                                                            target="_BLANK">Descargar</a>
                                                    @else
                                                        <a class="btn btn-primary btnhover" href="register">Descargar</a>
                                                    @endauth
                                                @else
                                                    @auth
                                                        @php
                                                            
                                                            $payment = [$book['name'] . '-' . $book['id'], $book['sale']];
                                                        @endphp
                                                        <x-home.paypal-button :data="$book" />
                                                        <!-- Set up a container element for the button -->
                                                        {{-- <div id="paypal-button-container-{{ $book['id'] }}" style="width: 30%"></div>
                                                    <x-home.paypal-button data="{{ $book['id'] }}" /> --}}
                                                    @else
                                                        <a class="btn btn-primary btnhover" href="register">Comprar
                                                            ${{ $book['sale'] }}</a>
                                                    @endauth
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container swiper-pagination-wrapper">
            <div class="swiper-pagination-five"></div>
        </div>
    </div>
    <div class="swiper main-swiper-thumb">
        <div class="swiper-wrapper">
            @foreach ($booksBanner as $book)
                <div class="swiper-slide">
                    <a href="{{ route('detail', $book['slug']) }}">
                        <div class="books-card">
                            <div class="tp-media">
                                <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">
                            </div>
                            <div class="tp-content">
                                <h5 class="title mb-0">{{ $book['name'] }}</h5>
                                <div class="tp-meta">
                                    <ul>
                                        <li>by {{ $book['autor'] }}</li>
                                    </ul>
                                </div>
                                <div class="book-footer">
                                    <div class="price">
                                        @if ($book['price'] == '0.00')
                                            <span class="price-num">GRATIS</span>
                                        @else
                                            <span class="price-num">${{ $book['sale'] }}</span>
                                        @endif
                                        @if ($book['discount'])
                                            <del>${{ $book['price'] }}</del>
                                            <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                        @endif
                                    </div>
                                    <div class="rate">
                                        <i class="flaticon-star text-yellow"></i>
                                        <i class="flaticon-star text-yellow"></i>
                                        <i class="flaticon-star text-yellow"></i>
                                        <i class="flaticon-star text-yellow"></i>
                                        <i class="flaticon-star text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
