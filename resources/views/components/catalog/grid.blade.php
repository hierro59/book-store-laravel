@props(['books', 'pay'])
<div class="row book-grid-row">
    @if (count($books) == 0)
        <h1 class="text-5xl">No hay coincidencias con su búsqueda</h1>
    @else
        @foreach ($books as $book)
            <div class="col-book style-1">
                <div class="tp-shop-card style-1">
                    <div class="tp-media">
                        <a href="" data-te-toggle="modal" data-te-target="#Modal{{ $book['id'] }}">
                            <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">
                        </a>
                    </div>
                    <div class="mt-3">
                        @if ($book['itsNew'] != null)
                            <span
                                class="p-2 bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                <i class="fa-solid fa-face-grin-stars"></i> Nuevo
                            </span>
                        @endif
                        @if ($book['edicion_tp'] == 1)
                            <span
                                class="p-2 bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                                <i class="fa-solid fa-award"></i> Original TP
                            </span>
                        @endif
                        @if ($book['autopublicado'] == 1)
                            <span
                                class="p-2 bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                <i class="fa-solid fa-user-pen"></i> Autopublicado
                            </span>
                        @endif
                    </div>

                    @if (Auth::check())
                        <div class="bookmark-btn style-2">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault{{ $book['name'] }}"
                                {{ !$book['heart'] ? '' : 'checked' }}>
                            <label class="form-check-label" for="flexCheckDefault{{ $book['name'] }}"
                                data-book_id="{{ $book['id'] }}" data-user_id="{{ Auth::user()->id }}">
                                <i class="flaticon-heart"></i>
                            </label>
                        </div>
                    @else
                        <a href="{{ route('login') }}">
                            <div class="bookmark-btn style-2">
                                <label class="form-check-label" for="flexCheckDefault{{ $book['name'] }}">
                                    <i class="flaticon-heart"></i>
                                </label>
                            </div>
                        </a>
                    @endif

                    <div class="tp-content">
                        <h3 class="text-2xl">{{ $book['name'] }}</h3>
                        <h4 class="text-1xl">{{ $book['autor'] }}</h4>
                        <ul class="tp-tags">
                            <li>{{ strtoupper($book['categoria']) }}</li>
                            {{-- <li>SCIENCE</li> --}}
                        </ul>
                        <ul class="tp-rating">
                            <i class="fas fa-heart text-red-700"> {{ $book['hearts'] }}</i>
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

                        </div>
                    </div>
                </div>
            </div>

            <x-catalog.modal :book="$book" :books="$books" />
        @endforeach
    @endif
</div>
