@props(['data'])

@php
    //dd($data);
    $book_id = isset($data['id']) ? $data['id'] : null;
    $book_name = isset($data['name']) ? $data['name'] : null;
    $autor = isset($data['autor']) ? $data['autor'] : null;
    $amount = isset($data['sale']) ? $data['sale'] : null;
    $codigo_ref = rand(10000, 99999);
    
    $sec01 = strtolower(str_replace('-', '', str_replace(' ', '', $book_name)));
    $sec02 = substr(sha1(time()), 0, 6);
    $sec03 = rand(10000, 99999);
    
    $getpayment = [
        'referencia' => $sec01 . '-' . $sec02 . "-$book_id-" . $sec03,
        'description' => "Compra del libro $book_name del autor $autor en TextoProhibido.shop",
        'amount' => $amount,
    ];
    
@endphp

{{-- {{ var_dump($data) }} --}}

<a href="{{ route('make.payment', $getpayment) }}" class="btn btn-primary btnhover" target="_BLANK">
    <i class="fa-brands fa-paypal mr-4"></i>
    Comprar ${{ $amount }}
</a>
