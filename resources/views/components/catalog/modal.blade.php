@props(['book', 'books'])

<style>
    .undefined {
        display: none !important;
    }
</style>

<!-- Modal -->
<div data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="Modal{{ $book['id'] }}" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[0px]:m-0 min-[0px]:h-full min-[0px]:max-w-none">
        <div
            class="pointer-events-auto relative flex w-full flex-col rounded-md bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600 min-[0px]:h-full min-[0px]:rounded-none min-[0px]:border-0">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                <!-- Modal title -->
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalFullscreenLabel">
                    {{ $book['name'] }}
                </h5>
                <!-- Close button -->
                <button type="button"
                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="relative p-4 min-[0px]:overflow-y-auto">



                <section class="content-inner-1">
                    <div class="container">
                        <div class="row book-grid-row style-4 m-b60">
                            <div class="col">
                                <div class="tp-box">
                                    <div class="w-2/4">
                                        <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">
                                    </div>
                                    <div class="tp-content">
                                        <div class="tp-header">
                                            <h1 class="text-5xl">{{ $book['name'] }}</h1>
                                            <div class="shop-item-rating">
                                                <div class="d-lg-flex d-sm-inline-flex d-flex align-items-center">
                                                    <ul class="tp-rating">
                                                        <li><i class="flaticon-star text-yellow"></i></li>
                                                        <li><i class="flaticon-star text-yellow"></i></li>
                                                        <li><i class="flaticon-star text-yellow"></i></li>
                                                        <li><i class="flaticon-star text-yellow"></i></li>
                                                        <li><i class="flaticon-star text-muted"></i></li>
                                                    </ul>
                                                    <h6 class="m-b0">4.0</h6>
                                                </div>
                                                {{-- <div class="social-area">
                                                    <ul class="tp-social-icon style-3">
                                                        <li><a href="#" target="_blank">
                                                            <i class="fa-brands fa-facebook-f"></i>
                                                        </a></li>
                                                        <li><a href="#" target="_blank"><i
                                                                    class="fa-brands fa-twitter"></i></a></li>
                                                        <li><a href="#" target="_blank"><i
                                                                    class="fa-brands fa-whatsapp"></i></a></li>
                                                        <li><a href="#"
                                                                target="_blank"><i class="fa-solid fa-envelope"></i></a>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="tp-body">
                                            <div class="book-detail">
                                                <ul class="book-info">
                                                    <li>
                                                        <div class="writer-info">

                                                            <img src="{{ asset($book['avatar']) }}" alt="book">
                                                            <div>
                                                                <span>Escrito por</span>{{ $book['autor'] }}
                                                            </div>
                                                        </div>
                                                    </li>
                                                    {{-- <li><span>Publisher</span>Printarea Studios</li> --}}
                                                    <li><span>Año</span> {{ $book['year'] }}</li>
                                                </ul>
                                            </div>
                                            <p class="text-1">{{ $book['detail'] }}</p>
                                            <div class="book-footer">
                                                @if ($book['price'] == '0.00')
                                                    <div class="price">
                                                        <h5>GRATIS</h5>
                                                    </div>
                                                @else
                                                    <div class="price">
                                                        <h5>$ {{ $book['sale'] }}</h5>
                                                        @if ($book['discount'])
                                                            <p class="p-lr10">$ {{ $book['price'] }}</p>
                                                        @endif
                                                    </div>
                                                @endif
                                                <div class="product-num">
                                                    @if ($book['price'] == '0.00')
                                                        @auth
                                                            <a class="btn btn-primary btnhover"
                                                                href="{{ asset($book['file_path']) }}" target="_BLANK">Leer
                                                                Gratis</a>
                                                        @else
                                                            <a class="btn btn-primary btnhover" href="login">Descargar</a>
                                                        @endauth
                                                    @else
                                                        @auth
                                                            @if ($book['owner'])
                                                                <a class="btn btn-primary btnhover"
                                                                    href="{{ asset($book['file_path']) }}"
                                                                    target="_BLANK">Leer
                                                                    en mi Biblioteca</a>
                                                            @else
                                                                <x-home.paypal-button :data="$book" />
                                                            @endif
                                                        @else
                                                            <a class="btn btn-primary btnhover" href="login"><span
                                                                    class="mr-2">Comprar ${{ $book['sale'] }} </span>
                                                                @if ($book['discount'])
                                                                    <span class="badge badge-danger">{{ $book['offer'] }}%
                                                                        OFF</span>
                                                                @endif
                                                            </a>
                                                        @endauth
                                                    @endif

                                                    <div class="bookmark-btn style-1 d-none d-sm-block">
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
                        </div>

                        <div class="row">
                            <div class="col-xl-8">
                                <div class="product-description tabs-site-button">
                                    <ul class="nav nav-tabs">
                                        <li>
                                            <a data-bs-toggle="tab" href="#graphic-design-1" class="active">
                                                Detalles
                                            </a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#developement-1">
                                                Opinión de los lectores
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="graphic-design-1" class="tab-pane show active">
                                            <table class="table border book-overview">
                                                <tr>
                                                    <th>Titulo del libro</th>
                                                    <td>{{ $book['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Autor</th>
                                                    <td>{{ $book['autor'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>ISBN</th>
                                                    <td>{{ $book['isbn'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Idioma de edición</th>
                                                    <td>Español</td>
                                                </tr>
                                                <tr>
                                                    <th>Formato del libro</th>
                                                    <td>Digital, PDF</td>
                                                </tr>
                                                <tr>
                                                    <th>Año de publicación</th>
                                                    <td>{{ $book['year'] }}</td>
                                                </tr>
                                                <tr class="tags">
                                                    <th>Tags</th>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            class="badge">{{ $book['categoria'] }}</a>
                                                        {{-- <a href="javascript:void(0);" class="badge">Aventura</a>
                                                        <a href="javascript:void(0);" class="badge">Supervivencia</a>
                                                        <a href="javascript:void(0);" class="badge">Biografía</a> --}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        {{-- OPNIONES --}}
                                        <!-- <div id="developement-1" class="tab-pane">
                                            <div class="clear" id="comment-list">
                                                <div class="post-comments comments-area style-1 clearfix">
                                                    <h4 class="comments-title">4 COMMENTS</h4>
                                                    <div id="comment">
                                                        <ol class="comment-list">
                                                            <li class="comment even thread-even depth-1 comment"
                                                                id="comment-2">
                                                                <div class="comment-body">
                                                                    <div class="comment-author vcard">
                                                                        <img src="images/profile4.jpg" alt=""
                                                                            class="avatar">
                                                                        <cite class="fn">Michel Poe</cite> <span
                                                                            class="says">says:</span>
                                                                        <div class="comment-meta">
                                                                            <a href="javascript:void(0);">December 28, 2022
                                                                                at 6:14 am</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-content dlab-page-text">
                                                                        <p>Donec suscipit porta lorem eget condimentum.
                                                                            Morbi vitae mauris in leo venenatis varius.
                                                                            Aliquam nunc enim, egestas ac dui in, aliquam
                                                                            vulputate erat.</p>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <a rel="nofollow" class="comment-reply-link"
                                                                            href="javascript:void(0);"><i
                                                                                class="fa fa-reply"></i> Reply</a>
                                                                    </div>
                                                                </div>
                                                                <ol class="children">
                                                                    <li class="comment byuser comment-author-w3itexpertsuser bypostauthor odd alt depth-2 comment"
                                                                        id="comment-3">
                                                                        <div class="comment-body" id="div-comment-3">
                                                                            <div class="comment-author vcard">
                                                                                <img src="images/profile3.jpg" alt=""
                                                                                    class="avatar">
                                                                                <cite class="fn">Celesto Anderson</cite>
                                                                                <span class="says">says:</span>
                                                                                <div class="comment-meta">
                                                                                    <a href="javascript:void(0);">December
                                                                                        28, 2022 at 6:14 am</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="comment-content dlab-page-text">
                                                                                <p>Donec suscipit porta lorem eget
                                                                                    condimentum. Morbi vitae mauris in leo
                                                                                    venenatis varius. Aliquam nunc enim,
                                                                                    egestas ac dui in, aliquam vulputate
                                                                                    erat.</p>
                                                                            </div>
                                                                            <div class="reply">
                                                                                <a class="comment-reply-link"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="fa fa-reply"></i> Reply</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ol>
                                                            </li>
                                                            <li class="comment even thread-odd thread-alt depth-1 comment"
                                                                id="comment-4">
                                                                <div class="comment-body" id="div-comment-4">
                                                                    <div class="comment-author vcard">
                                                                        <img src="images/profile2.jpg" alt=""
                                                                            class="avatar">
                                                                        <cite class="fn">Ryan</cite> <span
                                                                            class="says">says:</span>
                                                                        <div class="comment-meta">
                                                                            <a href="javascript:void(0);">December 28, 2022
                                                                                at 6:14 am</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-content dlab-page-text">
                                                                        <p>Donec suscipit porta lorem eget condimentum.
                                                                            Morbi vitae mauris in leo venenatis varius.
                                                                            Aliquam nunc enim, egestas ac dui in, aliquam
                                                                            vulputate erat.</p>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <a class="comment-reply-link"
                                                                            href="javascript:void(0);"><i
                                                                                class="fa fa-reply"></i> Reply</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="comment odd alt thread-even depth-1 comment"
                                                                id="comment-5">
                                                                <div class="comment-body" id="div-comment-5">
                                                                    <div class="comment-author vcard">
                                                                        <img src="images/profile1.jpg" alt=""
                                                                            class="avatar">
                                                                        <cite class="fn">Stuart</cite> <span
                                                                            class="says">says:</span>
                                                                        <div class="comment-meta">
                                                                            <a href="javascript:void(0);">December 28, 2022
                                                                                at 6:14 am</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-content dlab-page-text">
                                                                        <p>Donec suscipit porta lorem eget condimentum.
                                                                            Morbi vitae mauris in leo venenatis varius.
                                                                            Aliquam nunc enim, egestas ac dui in, aliquam
                                                                            vulputate erat.</p>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <a rel="nofollow" class="comment-reply-link"
                                                                            href="javascript:void(0);"><i
                                                                                class="fa fa-reply"></i> Reply</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div class="default-form comment-respond style-1" id="respond">
                                                        <h4 class="comment-reply-title" id="reply-title">LEAVE A REPLY
                                                            <small> <a rel="nofollow" id="cancel-comment-reply-link"
                                                                    href="javascript:void(0)" style="display:none;">Cancel
                                                                    reply</a> </small></h4>
                                                        <div class="clearfix">
                                                            <form method="post" id="comments_form" class="comment-form"
                                                                novalidate="">
                                                                <p class="comment-form-author"><input id="name"
                                                                        placeholder="Author" name="author" type="text"
                                                                        value=""></p>
                                                                <p class="comment-form-email"><input id="email"
                                                                        required="required" placeholder="Email" name="email"
                                                                        type="email" value=""></p>
                                                                <p class="comment-form-comment"><textarea id="comments" placeholder="Type Comment Here" class="form-control4" name="comment" cols="45"
                                                                    rows="3" required="required"></textarea></p>
                                                                <p class="col-md-12 col-sm-12 col-xs-12 form-submit">
                                                                    <button id="submit" type="submit"
                                                                        class="submit btn btn-primary filled">
                                                                        Submit Now <i class="fa fa-angle-right m-l10"></i>
                                                                    </button>
                                                                </p>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            {{-- BANNER RELACIONADOS --}}
                            {{-- <x-catalog.relate :relates="$books" /> --}}
                        </div>
                    </div>
                </section>




            </div>

            <!-- Modal footer -->
            <div
                class="mt-auto flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50 min-[0px]:rounded-none">
                <button type="button"
                    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                    data-te-modal-dismiss>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
