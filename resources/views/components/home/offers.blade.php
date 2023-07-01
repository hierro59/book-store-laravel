@props(['offers'])
<section class="content-inner-1">
    <div class="container">
        <div class="section-head book-align">
            <h2 class="title mb-0">Ofertas especiales</h2>
            <div class="pagination-align style-1">
                <div class="book-button-prev swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
                <div class="book-button-next swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
            </div>
        </div>
        <div class="swiper-container book-swiper">
            <div class="swiper-wrapper">
            @foreach ($offers as $book)
                <div class="swiper-slide">
                    <div class="tp-card style-2 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="tp-media" style="max-height: 220px; display: flex; justify-content: center; align-items: center;">
                            <a href="{{ route('detail', $book['book_slug']) }}"><img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt=""></a>
                        </div>
                        <div class="tp-info">
                            <h4 class="tp-title"><a href="{{ route('detail', $book['book_slug']) }}">{{ $book['book_name'] }}</a></h4>
                            <div class="tp-meta">
                                <ul class="tp-tags">
                                    <li><a href="{{ route('detail', $book['book_slug']) }}">{{ strtoupper($book['categoria']) }}</a></li>
                                    {{-- <li><a href="books-detail.html">THRILLER</a></li>
                                    <li><a href="books-detail.html">HORROR</a></li> --}}
                                </ul>
                            </div>
                            <p>{{ substr($book['book_detail'], 0, 80) }}...</p>
                            <div class="">
                                {{-- <a href="#" class="btn btn-primary m-t15 btnhover btnhover2"><i class="flaticon-shopping-cart-1 m-r10"></i> Add to cart</a> --}}
                                <div class="mt-4 text-center">
                                    @if ($book['price'] == "0.00")
                                        @auth
                                            <a class="btn btn-primary btnhover" href="{{ asset($book['book_file']) }}" target="_BLANK">Leer Gratis</a>
                                        @else
                                            <a class="btn btn-primary btnhover" href="login">Descargar</a>
                                        @endauth
                                    @else
                                        @auth
                                            @if ($book['owner'])
                                                <a class="btn btn-primary btnhover" href="{{ asset($book['book_file']) }}" target="_BLANK">Leer en mi Biblioteca</a>
                                            @else
                                            <span class="text-blue-800 font-extrabold text-4xl mr-4">${{ $book['sale'] }}</span>
                                            <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                                <x-home.paypal-button :data="$book" />
                                            @endif
                                        @else
                                            <a class="btn btn-primary btnhover" href="login"><span class="mr-2">Comprar ${{ $book['sale'] }} </span>
                                                @if ($book['discount'])
                                                    <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                                @endif
                                            </a>
                                        @endauth
                                    @endif
                                    {{-- @if ($book['price'] == "0.00")
                                        @auth
                                            <a class="btn btn-primary btnhover" href="storage/books/{{ $book['book_file'] }}" target="_BLANK">Descargar</a>
                                        @else
                                            <a class="btn btn-primary btnhover" href="login">Descargar</a>
                                        @endauth
                                    @else
                                        @auth
                                            <span class="text-blue-800 font-extrabold text-4xl mr-4">${{ $book['sale'] }}</span>
                                            <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                            @php
                                                $payment = [
                                                    $book['book_name'] . "-" . $book['book_id'],
                                                    $book['sale']
                                                ];
                                            @endphp
                                            <x-home.paypal-button :data="$payment" />
                                        @else
                                            <a class="btn btn-primary btnhover w-full" href="login"><span class="mr-2">Comprar ${{ $book['sale'] }} </span>
                                                @if ($book['discount'])
                                                    <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                                @endif
                                            </a>
                                        @endauth
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>