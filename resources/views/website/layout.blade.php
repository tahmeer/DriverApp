<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESWIFT</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-style.css') }}">
</head>

<body>

    <header>
        <div class="container-fluid">
            <div class="">
                <a class="navbar-brand" href="#">Cargo<span>2GO</span></a>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
            </div>
            <nav class="navbar-expand-lg bg-whites">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav gap-4">
                        <li class="nav-item">
                            <a class="nav-link px-2 active" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="#">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="#">OUR VEHICLES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="#">SECTORS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="#">PAYMENTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="#">DRIVER RECRUITMENT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2" href="#">CONTACT US</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('section')

    {{-- footer --}}
    <footer class="text-white">
        <div class="footer-inner">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="footer-left-side">
                            <p class="mb-3">
                                Founded in Manchester in 2006, Cargo 2 Go has grown to become one of the north's leading
                                Same Day couriers
                            </p>
                            <a href="#" class="btn btn-secondary d-inline-flex mb-3">
                                CONTACT US
                                <i class="fas fa-chevron-right"></i>
                            </a>
                            <address class="mb-2">
                                Cargo 2 Go UK Ltd The Station 26 Stockport Road Cheadle Greater Manchester SK8 2AA
                            </address>
                            <p class="mb-2">
                                Tel: <a href="tel:01612737733" class="text-white text-decoration-none">0161 273
                                    7733</a>
                            </p>
                            <p class="mb-2">Co Reg No: 5889750 VAT Reg No: 891914000</p>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="footer-right-side">
                            <h1 class="mb-0">Cargo<span class="text-danger fw-bold">2GO</span></h1>
                            <div class="footer-pages">
                                <a href="#" class="text-white text-decoration-none">Conditions of Carriage</a>
                                <a href="#" class="text-white text-decoration-none">Privacy & Cookie Policy</a>
                                <a href="#" class="text-white text-decoration-none">Terms & Conditions</a>
                            </div>
                            <div class="footer-logos">
                                <img src="{{ asset('image/certified-1.png') }}" alt="FIATA">
                                <img src="{{ asset('image/certified-2.jpg') }}" alt="RHA Member">
                                <img src="{{ asset('image/certified-1.png') }}" alt="BIFA">
                                <img src="{{ asset('image/certified-2.jpg') }}" alt="FORS">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="text-center small">
                    Website built by 
                    <a href="#" class="text-white text-decoration-underline">Tech</a>
                </div> --}}
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/theme-javascript.js') }}"></script>

    @stack('script')
</body>

</html>
