@props(['relates'])

<div class="col-xl-4 mt-5 mt-xl-0">
    <div class="widget">
        <h4 class="widget-title">Publicaciones relacionadas</h4>
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                @for ($i = 0; $i < 3; $i++)
                    <div class="tp-shop-card style-5">
                        <div class="tp-media">
                            <img src="{{ asset('thumbnail/covers/' . $relates[$i]['portada']) }}" alt="">
                        </div>
                        <div class="tp-content">
                            <h5 class="subtitle">{{ $relates[$i]['book_name'] }}</h5>
                            <ul class="tp-tags">
                                <li>{{ $relates[$i]['categoria'] }}</li>
                                {{-- <li>DRAMA,</li>
                                    <li>HORROR</li> --}}
                            </ul>
                            <div class="price">
                                @if ($relates[$i]['price'] == '0.00')
                                    <div class="price">
                                        <h5>GRATIS</h5>
                                    </div>
                                @else
                                    <div class="price">
                                        <span class="price-num">${{ $relates[$i]['sale'] }}</span>
                                        @if ($relates[$i]['discount'])
                                            <p class="p-lr10">$ {{ $relates[$i]['price'] }}</p>
                                        @endif
                                    </div>
                                @endif


                            </div>

                            <a href="{{ route('detail', $relates[$i]['slug']) }}"
                                class="btn btn-outline-secondary btnhover ms-4">Detalles</a>

                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
