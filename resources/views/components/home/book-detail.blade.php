@props(['book', 'books', 'avatar', 'pay'])
<section class="content-inner-1">
    <div class="container px-20">
        <div class="row book-grid-row style-4 m-b60">
            <div class="col">
                <div class="tp-box">
                    <div class="tp-media">
                        <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">
                    </div>
                    <div class="tp-content">
                        <div class="tp-header">
                            <h1 class="text-5xl font-bold">{{ $book['book_name'] }}</h1>
                            <div class="shop-item-rating">
                                {{-- <div class="d-lg-flex d-sm-inline-flex d-flex align-items-center">
                                    <ul class="tp-rating">
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-muted"></i></li>
                                    </ul>
                                    <h6 class="m-b0">4.0</h6>
                                </div> --}}
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
                                                <span>Escrito por</span>

                                                @if ($book['autor_id'] != null)
                                                    <a
                                                        href="{{ route('autor', $book['autor_id']) }}">{{ $book['autor'] }}</a>
                                                @else
                                                    <a>{{ $book['autor'] }}</a>
                                                @endif

                                            </div>
                                        </div>
                                    </li>
                                    {{-- <li><span>Publisher</span>Printarea Studios</li> --}}
                                    <li><span>Año</span>{{ $book['year'] }}</li>
                                </ul>
                            </div>
                            <p class="text-1">{{ $book['book_detail'] }}</p>

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
                                            <a class="btn btn-primary btnhover" href="{{ asset($book['book_file']) }}"
                                                target="_BLANK">Leer Gratis</a>
                                        @else
                                            <a class="btn btn-primary btnhover" href="{{ route('login') }}">Descargar</a>
                                        @endauth
                                    @else
                                        @auth
                                            @if ($book['owner'])
                                                <a class="btn btn-primary btnhover" href="{{ asset($book['book_file']) }}"
                                                    target="_BLANK">Leer en mi Biblioteca</a>
                                            @else
                                                <x-home.paypal-button :data="$pay" />
                                            @endif
                                        @else
                                            <a class="btn btn-primary btnhover" href="{{ route('login') }}"><span
                                                    class="mr-2">Comprar ${{ $book['sale'] }} </span>
                                                @if ($book['discount'])
                                                    <span class="badge badge-danger">{{ $book['offer'] }}% OFF</span>
                                                @endif
                                            </a>
                                        @endauth
                                    @endif

                                    <div class="bookmark-btn style-1 d-none d-sm-block">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault1">
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
                                    <td>{{ $book['book_name'] }}</td>
                                </tr>
                                <tr>
                                    <th>Autor</th>
                                    <td>{{ $book['autor'] }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de publicación</th>
                                    <td>{{ $book['year'] }}</td>
                                </tr>
                                <tr>
                                    <th>Idioma de edición</th>
                                    <td>Español</td>
                                </tr>
                                <tr>
                                    <th>Formato del libro</th>
                                    <td>Digital, PDF</td>
                                </tr>
                                {{-- <tr>
                                    <th>Editorial</th>
                                    <td>Wepress Inc.</td>
                                </tr>
                                <tr>
                                    <th>Paginas</th>
                                    <td>520</td>
                                </tr> --}}
                                <tr>
                                    <th>ISBN</th>
                                    <td>{{ $book['isbn'] }}</td>
                                </tr>
                                <tr class="tags">
                                    <th>Tags</th>
                                    <td>
                                        <a href="javascript:void(0);" class="badge">{{ $book['categoria'] }}</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        {{-- OPINIONES --}}
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
            <x-catalog.relate :relates="$books" />
        </div>
    </div>
</section>
