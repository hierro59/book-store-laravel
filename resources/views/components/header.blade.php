@props(['data'])

<!-- Main navigation container -->
<nav
  class="flex-no-wrap relative flex w-full items-center justify-between bg-white py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4"
  data-te-navbar-ref>
  <div class="flex w-full flex-wrap items-center justify-between px-3">
    <!-- Hamburger button for mobile view -->
    <button
      class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
      type="button"
      data-te-collapse-init
      data-te-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent1"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <!-- Hamburger icon -->
      <span class="[&>svg]:w-7">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="h-7 w-7">
          <path
            fill-rule="evenodd"
            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
            clip-rule="evenodd" />
        </svg>
      </span>
    </button>

    <!-- Collapsible navigation container -->
    <div
      class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
      id="navbarSupportedContent1"
      data-te-collapse-item>
      <!-- Logo -->
      <a
        class="mb-4 mr-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
        href="{{ route('welcome') }}">
        <img
          src="{{ asset('assets/images/logo-header.svg') }}"
          style="height: 30px"
          alt="Textos Prohibidos"
          title="Textos Prohibidos"
          loading="lazy" />
      </a>
        <form class="search-input p-4">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Descubre historias">
                <button class="btn" type="button"><i class="flaticon-loupe"></i></button>
            </div>
        </form>
      <!-- Left navigation links -->
      <ul
        class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"
        data-te-navbar-nav-ref>
        <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
          <!-- Dashboard link -->
          <a
            class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
            href="{{ route('welcome') }}"
            data-te-nav-link-ref
            >Home</a
          >
        </li>
        <!-- Team link -->
        <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
          <a
            class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
            href="{{ route('catalog') }}"
            data-te-nav-link-ref
            >Catálogo</a
          >
        </li>
        <!-- Projects link -->
        <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
          <a
            class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
            href="{{ route('publish') }}"
            data-te-nav-link-ref
            >Publicar</a
          >
        </li>
      </ul>
    </div>

    

    @auth
    <!-- Right elements -->
    <div class="relative flex items-center">
      <!-- Cart Icon -->
      <a
        class="mr-4 text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
        href="{{ route('my-library') }}" title="Mi Biblioteca">
        <span class="[&>svg]:w-5">
          <svg 
          xmlns="http://www.w3.org/2000/svg" 
          height="1em" viewBox="0 0 448 512"
          fill="currentColor"
          class="h-5 w-5">
          <path d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z"/></svg>

        </span>
      </a>

      <!-- Container with two dropdown menus -->
      <div class="relative" data-te-dropdown-ref>
        <!-- First dropdown trigger -->
        <a
          class="hidden-arrow mr-4 flex items-center text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
          href="#"
          id="dropdownMenuButton1"
          role="button"
          data-te-dropdown-toggle-ref
          aria-expanded="false">
          <!-- Dropdown trigger icon -->
          <span class="[&>svg]:w-5">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="h-5 w-5">
              <path
                fill-rule="evenodd"
                d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                clip-rule="evenodd" />
            </svg>
          </span>
          <!-- Notification counter -->
          <span
            class="absolute -mt-2.5 ml-2 rounded-[0.37rem] bg-danger px-[0.45em] py-[0.2em] text-[0.6rem] leading-none text-white"
            >1</span
          >
        </a>
        <!-- First dropdown menu -->
        {{-- <ul
          class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
          aria-labelledby="dropdownMenuButton1"
          data-te-dropdown-menu-ref>
          <!-- First dropdown menu items -->
          <li>
            <a
              class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
              href="#"
              data-te-dropdown-item-ref
              >Action</a
            >
          </li>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
              href="#"
              data-te-dropdown-item-ref
              >Another action</a
            >
          </li>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
              href="#"
              data-te-dropdown-item-ref
              >Something else here</a
            >
          </li>
        </ul> --}}
      </div>

      <!-- Second dropdown container -->
      <div class="relative mr-6" data-te-dropdown-ref>
        <!-- Second dropdown trigger -->
        <a
          class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
          href="#"
          id="dropdownMenuButton2"
          role="button"
          data-te-dropdown-toggle-ref
          aria-expanded="false">
          <!-- User avatar -->
          <img
            src="{{ asset('assets/images/profile1.png') }}"
            class="rounded-full"
            style="height: 25px; width: 25px"
            alt=""
            loading="lazy" />
        </a>
        <!-- Second dropdown menu -->
        <ul
          class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-sm border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
          aria-labelledby="dropdownMenuButton2"
          data-te-dropdown-menu-ref>
          <!-- Second dropdown menu items -->
          <li>
            <a
                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                href="{{ route('profile.edit') }}"
                data-te-dropdown-item-ref
            >
                <i class="fa-regular fa-user"></i>
                {{ Auth::user()->name }}
            </a>
          </li>
          <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
          <li>
            <a
                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                href="#"
                data-te-dropdown-item-ref
            >
            <i class="fa-regular fa-heart"></i>
                Lista de deseos
            </a>
          </li>
          <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
          <li>
            <a
                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                href="{{ route('dashboard') }}"
                data-te-dropdown-item-ref
            >
                <i class="fa-solid fa-sliders"></i> Dashboard
            </a>
          </li>
          <li>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                
                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();" class="">
                   <i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
          </li>
        </ul>
      </div>
    </div>
    @else
        <a href="{{ route('login') }}"
            class="mr-2 inline-block rounded px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 dark:text-primary-400 dark:hover:bg-neutral-700 dark:hover:bg-opacity-60 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
            data-te-ripple-init data-te-ripple-color="light">
            Login
        </a>
        <a href="{{ route('register') }}"
            class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init data-te-ripple-color="light">
            Registrate gratis
        </a>
    @endauth
  </div>
</nav>


























{{-- <header class="site-header mo-left header style-1">
    <!-- Main Header -->
    <div class="header-info-bar">
        <div class="container clearfix">
            <!-- Website Logo -->
            <div class="logo-header logo-dark">
                <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
            </div>
            
            <!-- EXTRA NAV -->
            <div class="extra-nav">
                <div class="extra-cell">
                    <ul class="navbar-nav header-right">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewbox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"></path></svg>
                                    <span class="badge">21</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown profile-dropdown  ms-4">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/profile1.png') }}" alt="/">
                                    <div class="profile-info">
                                        <h6 class="title">{{ Auth::user()->name }}</h6>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu py-0 dropdown-menu-end">
                                    <div class="dropdown-header">
                                        <span>Información del usuario</span>
                                    </div>
                                    <div class="dropdown-body">
                                        <a href="{{ route('profile.edit') }}" class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewbox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
                                                <span class="ms-2">Perfil</span>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewbox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"></path></svg>
                                                <span class="ms-2">Lista de deseos</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();" class="btn btn-primary w-100 btnhover btn-sm">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                        
                                    </div>
                                </div>
                            </li>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary w-100 btnhover btn-sm m-2">{{ __('Login') }}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary w-100 btnhover btn-sm">{{ __('Register') }}</a>
                            @endif
                        @endauth
                        
                    </ul>
                </div>
            </div>
            
            <!-- header search nav -->
            <div class="header-search-nav">
                <form class="header-item-search">
                    <div class="input-group search-input">
                        {{-- <select id="categorie" name="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($categorias as $v)
                                <option value="{{ $v->id }}">{{ $v->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Encuentra tu libro aquí...">
                        <button class="btn" type="button"><i class="flaticon-loupe"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Main Header End -->
    
    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
            <div class="container clearfix">
                <!-- Website Logo -->
                <div class="logo-header logo-dark">
                    <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                </div>
                
                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <!-- EXTRA NAV -->
                @auth
                <div class="extra-nav">
                    <div class="extra-cell">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btnhover">Mis libros</a>	
                    </div>
                </div>
                @endauth
                
                <!-- Main Nav -->
                <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                    <div class="logo-header logo-dark">
                        <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
                    </div>
                    <form class="search-input">
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search Books Here">
                            <button class="btn" type="button"><i class="flaticon-loupe"></i></button>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                        <li class="sub-menu-down"><a href="javascript:void(0);"><span>{{ __("Home") }}</span></a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Inicio</a></li>
                            </ul>
                        </li> 
                        <li><a href="{{ route('welcome') }}"><span>{{ __("Home") }}</span></a></li>
                        <li><a href="{{ route('catalog') }}"><span>{{ __("Catalog") }}</span></a></li>
                        <li><a href="{{ route('publish') }}"><span>{{ __("Publish") }}</span></a></li>
                    </ul>
                    <div class="tp-social-icon">
                        <ul>
                            <li><a class="fab fa-facebook-f" target="_blank" href="#"></a></li>
                            <li><a class="fab fa-twitter" target="_blank" href="#"></a></li>
                            <li><a class="fab fa-instagram" target="_blank" href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header End -->
    
</header> --}}