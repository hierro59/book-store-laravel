@props(['booksRecomendations'])
<section class="content-inner-1 bg-grey reccomend ">
    <div class="container">
        <div class="section-head text-center">
            <h2 class="title">Nuestras recomendaciones para ti</h2>
            <p>Sumérgete en el fascinante mundo de la literatura independiente y descubre una exclusiva selección de libros escritos por autores independientes que desafían las convenciones literarias.</p>
        </div>
        <!-- Swiper -->
        <div class="swiper-container swiper-two">
            <div class="swiper-wrapper">
            @foreach ($booksRecomendations as $book)
                <div class="swiper-slide">
                    <a href="{{ route('detail', $book['book_slug']) }}">
                    <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="tp-media">
                            <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">									
                        </div>
                        <div class="tp-content">
                            <h4 class="title">{{ $book['book_name'] }}</h4>
                            @if ($book['price'] == "0.00")
                                <span class="price">GRATIS</span>
                            @else
                                <span class="price">${{ $book['price'] }}</span>
                            @endif
                            
                            @if ($book['price'] == "0.00")
                                @auth
                                    <a class="btn btn-primary btnhover" href="../storage/books/{{ $book['book_file'] }}" target="_BLANK">Leer Gratis</a>
                                @else
                                    <a class="btn btn-primary btnhover" href="login">Descargar</a>
                                @endauth
                            @else
                                @auth
                                    @if ($book['owner'])
                                        <a class="btn btn-primary btnhover" href="../storage/books/{{ $book['book_file'] }}" target="_BLANK">Leer en mi Biblioteca</a>
                                    @else
                                        <x-home.paypal-button :data="$book" /> 
                                        @if ($book['discount'])
                                            <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                        @endif
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
                                    <x-home.paypal-button :data="$book" /> 
                                @else
                                    <a class="btn btn-primary btnhover" href="login"><span class="mr-2">Comprar ${{ $book['sale'] }} </span>
                                        @if ($book['discount'])
                                            <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                        @endif
                                    </a>
                                @endauth
                            @endif --}}
                        </div>
                        
                    </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>