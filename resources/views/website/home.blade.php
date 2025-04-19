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
                {{-- <a href="">
                    <img src="{{ asset('image/logo.png') }}" alt="Cargo Truck" />
                </a> --}}
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

    <!-- Hero Banner -->
    <section class="hero-section">
        <div class="swiper heroSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('image/Banner-1.png') }}" alt="Cargo Truck" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('image/banner-3.jpg') }}" alt="Cargo Truck" />
                </div>
            </div>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1>When it has to get <br> there, you can rely on <br> Cargo2Go</h1>
                <button class="btn btn-primary btn-request">
                    REQUEST COLLECTION <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    {{-- Easy Booking --}}
    <section class="text-center easy-booking">
        <div class="container">
            <h2 class="sc-title mb-3">Booking is as easy as 1-2-3</h2>
            <p class="sc-content">
                With our own fleet and access to a huge nationwide network of vehicles, Cargo2Go can service any
                transport requirement throughout the UK and Europe. Booking with Cargo2Go is as easy as 1-2-3.
            </p>

            <!-- Grid layout -->
            <div class="swiper easyBookingSlider mt-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="easy-booking-grid justify-content-center">
                            <!-- Left section -->
                            <div class="eb-grid-left">
                                <div class="eb-gl-circle-number">1</div>
                                <div class="text-start eb-gl-text">
                                    <h3>Vehicle is despatched</h3>
                                    <p>Vehicle is despatched and with you within the hour</p>
                                </div>
                            </div>

                            <!-- Right image section -->
                            <div class="text-start">
                                <img src="{{ asset('image/eb-images-1.png') }}" alt="Vehicle" class="van-img">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="easy-booking-grid justify-content-center">
                            <!-- Left section -->
                            <div class="eb-grid-left">
                                <div class="eb-gl-circle-number">2</div>
                                <div class="text-start eb-gl-text">
                                    <h3>Vehicle is despatched</h3>
                                    <p>Vehicle is despatched and with you within the hour</p>
                                </div>
                            </div>

                            <!-- Right image section -->
                            <div class="text-center">
                                <img src="{{ asset('image/eb-images-1.png') }}" alt="Vehicle" class="van-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    {{-- Slanted section --}}
    <section class="slanted-section">
        <div class="container slanted-content">
            <!-- Left side image -->
            <div class="slanted-image">
                <img src="{{ asset('image/brand-alpha-bet.png') }}" alt="G Letter" class="g-img">
            </div>

            <!-- Right side text -->
            <div class="slanted-text">
                <h2>Collections within 1 hour</h2>
                <p>
                    We have vehicles delivering throughout the UK on a daily basis, and are able to collect and deliver
                    from any location within the UK
                </p>
                <button class="btn btn-secondary">
                    REQUEST A VAN
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    {{-- Experience Section --}}
    <section class="experience-section">
        <div class="container">
            <h2 class="exp-title">Over 60 years combined staff experience</h2>

            <div class="swiper experienceSlider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="exp-card h-100">
                            <img src="{{ asset('image/exp-image-1.jpg') }}" alt="Credibility">
                            <div class="exp-card-body">
                                <h5>Credibility</h5>
                                <p>Still privately owned and run day-to-day by its directors, we serve all types of
                                    customer, large and small, from blue-chip multi-nationals to local sole traders. We
                                    handle hundreds of bookings per day...</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="exp-card h-100">
                            <img src="{{ asset('image/eb-images-1.png') }}" alt="Breadth of Service">
                            <div class="exp-card-body">
                                <h5>Breadth of Service</h5>
                                <p>By choosing Cargo 2 Go, you will have access to all commercial vehicles, from small
                                    vans to specialist vehicles like flat beds, moffets, and hiabs. One phone call
                                    covers all your needs with single-bill invoicing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="exp-card h-100">
                            <img src="{{ asset('image/exp-image-2.jpg') }}" alt="Account Management">
                            <div class="exp-card-body">
                                <h5>Account Management</h5>
                                <p>Knowledgeable staff are always on hand to assist with whatever requirement you may
                                    have. Should you need site visits or a transport evaluation, we will arrange for
                                    your account manager to visit to assess.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="exp-card h-100">
                            <img src="{{ asset('image/eb-images-1.png') }}" alt="Breadth of Service">
                            <div class="exp-card-body">
                                <h5>Breadth of Service</h5>
                                <p>By choosing Cargo 2 Go, you will have access to all commercial vehicles, from small
                                    vans to specialist vehicles like flat beds, moffets, and hiabs. One phone call
                                    covers all your needs with single-bill invoicing.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- Features List -->
            <ul class="features-list">
                <li>
                    <i class="fas fa-headset"></i>
                    <p>No call centres or queuing systems</p>
                </li>
                <li>
                    <i class="fas fa-bolt"></i>
                    <p>Quick collections within 1 hour</p>
                </li>
                <li>
                    <i class="fas fa-clock"></i>
                    <p>Open 24 hours a day, all year round</p>
                </li>
            </ul>
        </div>
    </section>

    {{-- Help Section --}}
    <section class="help-section">
        <img src="{{ asset('image/Banner-1.png') }}" alt="" class="help-banner">
        <div class="help-sec-inner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <h2 class="mb-3">Can we help?</h2>
                        <p class="mb-5">We have vehicles delivering throughout the UK on a daily basis, we are able
                            to collect your goods from any location and deliver them to any part of the country on a
                            same day basis.</p>
                        <button class="btn btn-primary">
                            REQUEST A VAN
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="col-xl-6">
                        <ul class="help-list">
                            <li>
                                <div class="help-icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <p class="mb-0">Transport and Haulage Companies</p>
                            </li>
                            <li>
                                <div class="help-icon">
                                    <i class="fas fa-microchip"></i>
                                </div>
                                <p class="mb-0">Hi-Tec Engineering and Technology</p>
                            </li>
                            <li>
                                <div class="help-icon">
                                    <i class="fas fa-link"></i>
                                </div>
                                <p class="mb-0">Supply Chain</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Offices --}}
    <section class="offices-section">
        <div class="container">
            <div class="offices-title text-center">
                <h1>Our Offices</h1>
                <p>Get in touch with our team across the UK</p>
            </div>
            <div class="row">
                <!-- Manchester (Head Office) -->
                <div class="col-md-6 col-lg-4">
                    <div class="office-card card p-4 head-office">
                        <h3 class="office-title">Manchester <span class="badge bg-primary">Head Office</span></h3>
                        <div class="contact-info mt-3">
                            <p><i class="fas fa-phone contact-icon"></i> 0161 273 7733</p>
                            <p><i class="fas fa-map-marker-alt contact-icon"></i> Greater Manchester, UK</p>
                        </div>
                    </div>
                </div>

                <!-- Leeds Office -->
                <div class="col-md-6 col-lg-4">
                    <div class="office-card card p-4">
                        <h3 class="office-title">Leeds Office</h3>
                        <div class="contact-info mt-3">
                            <p><i class="fas fa-phone contact-icon"></i> 0113 347 0010</p>
                            <p><i class="fas fa-map-marker-alt contact-icon"></i> West Yorkshire, UK</p>
                        </div>
                    </div>
                </div>

                <!-- Doncaster Office -->
                <div class="col-md-6 col-lg-4">
                    <div class="office-card card p-4">
                        <h3 class="office-title">Doncaster Office</h3>
                        <div class="contact-info mt-3">
                            <p><i class="fas fa-phone contact-icon"></i> 01302 460 100</p>
                            <p><i class="fas fa-map-marker-alt contact-icon"></i> South Yorkshire, UK</p>
                        </div>
                    </div>
                </div>

                <!-- Warrington Office -->
                <div class="col-md-6 col-lg-4">
                    <div class="office-card card p-4">
                        <h3 class="office-title">Warrington Office</h3>
                        <div class="contact-info mt-3">
                            <p><i class="fas fa-phone contact-icon"></i> 01925 205000</p>
                            <p><i class="fas fa-map-marker-alt contact-icon"></i> Cheshire, UK</p>
                        </div>
                    </div>
                </div>

                <!-- Wakefield Office -->
                <div class="col-md-6 col-lg-4">
                    <div class="office-card card p-4">
                        <h3 class="office-title">Wakefield Office</h3>
                        <div class="contact-info mt-3">
                            <p><i class="fas fa-phone contact-icon"></i> 01924 637177</p>
                            <p><i class="fas fa-map-marker-alt contact-icon"></i> West Yorkshire, UK</p>
                        </div>
                    </div>
                </div>

                <!-- Liverpool Office -->
                <div class="col-md-6 col-lg-4">
                    <div class="office-card card p-4">
                        <h3 class="office-title">Liverpool Office</h3>
                        <div class="contact-info mt-3">
                            <p><i class="fas fa-phone contact-icon"></i> 0151 321 2500</p>
                            <p><i class="fas fa-map-marker-alt contact-icon"></i> Merseyside, UK</p>
                        </div>
                    </div>
                </div>

                <!-- Halifax Office -->
                <div class="col-md-6 col-lg-4">
                    <div class="office-card card p-4">
                        <h3 class="office-title">Halifax Office</h3>
                        <div class="contact-info mt-3">
                            <p><i class="fas fa-phone contact-icon"></i> 01422 886710</p>
                            <p><i class="fas fa-map-marker-alt contact-icon"></i> West Yorkshire, UK</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <script>
        // hero slider
        let hSlider = new Swiper(".heroSlider", {
            effect: 'fade',
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            fadeEffect: {
                crossFade: true,
            },
        });

        // easy booking slider
        let ebSlider = new Swiper(".easyBookingSlider", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        const swiper = new Swiper('.experienceSlider', {
            loop: true,
            spaceBetween: 30,
            slidesPerView: 1,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                }
            }
        });
    </script>
</body>

</html>
