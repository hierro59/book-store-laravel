@props(['books'])
<div class="row book-grid-row">
    @foreach ($books as $book)
    <div class="col-book style-1">
        <div class="tp-shop-card style-1">
            <div class="tp-media">
                <a href="storage/books/{{ $book['book_file'] }}">
                    <img src="{{ asset('thumbnail/covers/' . $book['portada']) }}" alt="book">
                </a>
            </div>
            <div class="bookmark-btn style-2">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault{{ $book['book_name'] }}">
                <label class="form-check-label" for="flexCheckDefault{{ $book['book_name'] }}">
                    <i class="flaticon-heart"></i>
                </label>
            </div>
            <div class="tp-content">
                <h5 class="title">{{ $book['book_name'] }}</h5>
                <ul class="tp-tags">
                    <li>{{ strtoupper($book['categoria']) }}</li>
                    {{-- <li>SCIENCE</li> --}}
                </ul>
                <ul class="tp-rating mb-10">
                    <li><i class="flaticon-star text-yellow"></i></li>
                    <li><i class="flaticon-star text-yellow"></i></li>
                    <li><i class="flaticon-star text-yellow"></i></li>
                    <li><i class="flaticon-star text-yellow"></i></li>
                    <li><i class="flaticon-star text-yellow"></i></li>
                </ul>
                <div class="book-footer">
                    
                    <a class="btn btn-primary btnhover" href="storage/books/{{ $book['book_file'] }}" target="_BLANK">Leer</a>
                    
                </div>
            </div>
        </div>
    </div>
    
    @endforeach
</div>