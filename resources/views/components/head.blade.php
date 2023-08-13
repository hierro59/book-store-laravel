<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- FAVICONS ICON -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon.png') }}">

    <!-- PAGE TITLE HERE -->
    <title>Texto Prohibido &#8211; Descubre la magia de los textos que desafían las reglas</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icons/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    <!-- Metas OG-->
    @if (Route::currentRouteName() == 'catalog')
        <meta property="og:title" content="Textos Prohibidos · Nuestro catálogo" />
        <meta property="og:description" content="Descubre la magia de los textos que desafían las reglas." />
        <meta property="og:image" content="https://textosprohibidos.shop/assets/images/background/bgLibrary.webp" />
    @elseif (Route::currentRouteName() == 'autor')
        <meta property="og:title" content="Textos Prohibidos · {{ $autor->name }}" />
        <meta property="og:description" content="{{ $autor->biography }}" />
        <meta property="og:image" content="{{ asset($avatar) }}" />
    @elseif (Route::currentRouteName() == 'detail')
        <meta property="og:title" content="Textos Prohibidos · {{ $data['book_name'] }} · {{ $data['autor'] }}" />
        <meta property="og:description" content="{{ $data['book_detail'] }}" />
        <meta property="og:image" content="{{ asset('thumbnail/covers/' . $data['portada']) }}" />
    @else
        <meta property="og:title" content="Textos Prohibidos · Autores independientes" />
        <meta property="og:description" content="Descubre la magia de los textos que desafían las reglas." />
        <meta property="og:image" content="https://textosprohibidos.shop/assets/images/background/bgLibrary.webp" />
    @endif

    <meta property="og:type" content="WebApp" />
    <meta property="og:url" content="https://textosprohibidos.shop" />

</head>
