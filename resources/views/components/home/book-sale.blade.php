@props(['booksSales'])
<section class="content-inner-1">
    <div class="container">
        <div class="section-head book-align">
            <h2 class="title mb-0">Libros en Venta</h2>
            <div class="pagination-align style-1">
                <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
                <div class="swiper-pagination-two"></div>
                <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
            </div>
        </div>
        <div class="swiper-container books-wrapper-3 swiper-four">
            <div class="swiper-wrapper">
                @foreach ($booksSales as $book)
                    <div class="swiper-slide">
                        <a href="{{ route('detail', $book['slug']) }}">
                            <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="tp-media">
                                    <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">
                                </div>
                                <div class="tp-content">
                                    <h5 class="title"><a
                                            href="{{ route('detail', $book['slug']) }}">{{ $book['name'] }}</a></h5>
                                    <ul class="tp-tags">
                                        <li><a href="{{ route('detail', $book['slug']) }}">{{ $book['categoria'] }}</a>
                                        </li>
                                        {{-- <li><a href="books-grid-view.html">DRAMA</a></li> --}}
                                    </ul>
                                    <div class="book-footer">
                                        <div class="rate">
                                            <i class="fas fa-heart text-red-700"> {{ $book['hearts'] }}</i>
                                        </div>
                                        @if ($book['discount'])
                                            <span class="badge badge-warning">Oferta</span>
                                        @endif
                                        <div class="price">
                                            @if ($book['price'] == '0.00')
                                                <span class="price-num">GRATIS</span>
                                            @else
                                                <span class="price-num">${{ $book['sale'] }}</span>
                                            @endif
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
</section>
