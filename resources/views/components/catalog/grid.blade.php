@props(['books', 'pay'])
<div class="row book-grid-row">
    @foreach ($books as $book)
        <div class="col-book style-1">
            <div class="tp-shop-card style-1">
                <div class="tp-media">
                    <a href="" data-te-toggle="modal" data-te-target="#Modal{{ $book['id'] }}">
                        <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">
                    </a>
                </div>
                <div class="bookmark-btn style-2">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{ $book['name'] }}">
                    <label class="form-check-label" for="flexCheckDefault{{ $book['name'] }}">
                        <i class="flaticon-heart"></i>
                    </label>
                </div>
                <div class="tp-content">
                    <h5 class="title">{{ $book['name'] }}</h5>
                    <ul class="tp-tags">
                        <li>{{ strtoupper($book['categoria']) }}</li>
                        {{-- <li>SCIENCE</li> --}}
                    </ul>
                    <ul class="tp-rating">
                        <li><i class="flaticon-star text-yellow"></i></li>
                        <li><i class="flaticon-star text-yellow"></i></li>
                        <li><i class="flaticon-star text-yellow"></i></li>
                        <li><i class="flaticon-star text-yellow"></i></li>
                        <li><i class="flaticon-star text-yellow"></i></li>
                    </ul>
                    <div class="book-footer">
                        {{-- <div class="price">
                        <span class="price-num">${{ $book['sale'] }}</span>
                        @if ($book['discount'])
                            <del>${{ $book['price'] }}</del>
                        @endif
                    </div> --}}
                        @if ($book['price'] == '0.00')
                            <div class="price">
                                <span class="price-num">GRATIS</span>
                            </div>
                        @else
                            <div class="price">
                                <span class="price-num">$ {{ $book['sale'] }}</span>
                                @if ($book['discount'])
                                    <del>$ {{ $book['price'] }}</del>
                                @endif
                            </div>
                        @endif
                        @if ($book['price'] == '0.00')
                            @auth
                                <a class="btn btn-primary btnhover" href="{{ asset($book['file_path']) }}"
                                    target="_BLANK">Leer Gratis</a>
                            @else
                                <a class="btn btn-primary btnhover" href="login">Descargar</a>
                            @endauth
                        @else
                            @auth
                                @if ($book['owner'])
                                    <a class="btn btn-primary btnhover" href="{{ asset($book['file_path']) }}"
                                        target="_BLANK">Leer en mi Biblioteca</a>
                                @else
                                    <x-home.paypal-button :data="$book" />
                                    <a class="btn btn-primary btnhover" data-te-toggle="modal"
                                        data-te-target="#Modal{{ $book['id'] }}">
                                        <i class="fa-solid fa-eye mr-2"></i>
                                        Ver mas
                                    </a>
                                @endif
                            @else
                                <a class="btn btn-primary btnhover" href="login"><span class="mr-2">Comprar
                                        ${{ $book['sale'] }} </span>
                                    @if ($book['discount'])
                                        <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                    @endif
                                </a>
                                <a class="btn btn-primary btnhover" data-te-toggle="modal"
                                    data-te-target="#Modal{{ $book['id'] }}">
                                    <i class="fa-solid fa-eye mr-2"></i>
                                    Ver mas
                                </a>
                            @endauth
                        @endif

                        {{-- <button
                        type="button"
                        class="btnhover btnhover2 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        <i class="fa-solid fa-cart-shopping mr-2"></i>
                        Comprar
                    </button>
                    <button
                        type="button"
                        class="btnhover btnhover2 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-toggle="modal"
                        data-te-target="#Modal{{ $book['book_id'] }}"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        <i class="fa-solid fa-eye mr-2"></i>
                        Ver mas
                    </button> --}}

                    </div>
                </div>
            </div>
        </div>

        <x-catalog.modal :book="$book" :books="$books" />
    @endforeach
</div>
