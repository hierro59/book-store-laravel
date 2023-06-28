@props(['books'])

<div class="row">
    @foreach ($books as $book)
    <div class="col-md-12 col-sm-12">
        <div class="tp-shop-card style-2">
            <div class="tp-media">
                <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">
            </div>
            <div class="tp-content">
                <div class="tp-header">
                    <div>
                        <ul class="tp-tags">
                            <li>{{ strtoupper($book['categoria']) }}</li>
                            {{-- <li>SCIENCE,</li>
                            <li>COMEDY</li> --}}
                        </ul>
                        <h4 class="title mb-0">{{ $book['book_name'] }}</h4>
                    </div>
                    <div class="price">
                        <span class="price-num text-primary">$ {{ $book['sale'] }}</span>
                        @if ($book['discount'])
                            <del>$ {{ $book['price'] }}</del>
                        @endif
                    </div>
                </div>

                <div class="tp-body">
                    <div class="tp-rating-box">
                        <div>
                            <p class="tp-para">{{ $book['book_detail'] }}</p>
                            <div>
                                <a href="pricing.html" class="badge">Get 20% Discount for today</a>
                                <a href="pricing.html" class="badge">50% OFF Discount</a>
                                <a href="pricing.html" class="badge next-badge">See 2+ promos</a>
                            </div>
                        </div>
                        <div class="review-num">
                            <h4>4.0</h4>
                            <ul class="tp-rating">
                                <li><i class="flaticon-star text-yellow"></i></li>
                                <li><i class="flaticon-star text-yellow"></i></li>
                                <li><i class="flaticon-star text-yellow"></i></li>
                                <li><i class="flaticon-star text-yellow"></i></li>
                                <li><i class="flaticon-star text-muted"></i></li>
                            </ul>
                            <span><a href="javascript:void(0);"> 235 Reviews</a></span>
                        </div>
                    </div>
                    <div class="rate">
                        <ul class="book-info">
                            <li><span>Writen by</span>{{ $book['autor'] }}</li>
                            {{-- <li><span>Publisher</span>Printarea Studios</li> --}}
                            <li><span>Year</span>2019</li>
                        </ul>
                        <div class="d-flex">
                            <button
                                type="button"
                                class="mr-2 btnhover btnhover2 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                <i class="fa-solid fa-cart-shopping mr-2"></i>
                                Comprar
                            </button>
                            <button
                                type="button"
                                class="btnhover btnhover2 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-toggle="modal"
                                data-te-target="#Modal{{ $book['book_id'] }}-l"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                <i class="fa-solid fa-eye m-r10"></i>
                                Ver mas
                            </button>
                            <div class="bookmark-btn style-1">
                                <input class="form-check-input" type="checkbox"
                                    id="flexCheckDefault1">
                                <label class="form-check-label" for="flexCheckDefault1">
                                    <i class="flaticon-heart"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-catalog.modal-list :book="$book" :books="$books" />
    @endforeach
</div>