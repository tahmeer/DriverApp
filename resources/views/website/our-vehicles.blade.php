@extends('website.layout')
@section('section')
    {{-- Inner Banner --}}
    @include('website.common-section.inner-banner', [
        'title' => 'Choose a vehicle',
        'description' =>
            'Cargo2Go has a vehicle that is suitable for your business needs. View our vehicles and make a booking below.',
    ])

    {{-- our vehicles section --}}
    <section class="van-sec">
        <div class="container">
            <p class="van-main-content">From a small van to a full load artic, we provide the full range of vehicles.</p>
            <div class="van-card">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <img src="{{ asset('image/small-van.png') }}" alt="Small Van" class="van-card-img">
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="van-card-content">
                            <h1 class="title-bottom-line">Small Van</h1>
                            <p>Able to carry 1 standard UK pallet. Approx Payload 400kg.</p>
                            <button class="btn btn-primary van-card-btn">
                                REQUEST Booking <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="van-status-card">
                    <div class="left">
                        <div class="van-status-number">400kg</div>
                        <div class="underline"></div>
                        <div class="van-status-label">TOTAL PAYLOAD</div>
                    </div>
                    <div class="right">
                        <div class="van-status-number">01</div>
                        <div class="underline"></div>
                        <div class="van-status-label">UK STD PALLETS</div>
                    </div>
                </div>
            </div>
            <div class="van-card van-card-reverse">
                <div class="row align-items-center flex-md-row-reverse">
                    <div class="col-lg-6 col-12">
                        <img src="{{ asset('image/short-wheel-van.png') }}" alt="Small Van" class="van-card-img">
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="van-card-content">
                            <h1 class="title-bottom-line">Short Wheel Base Van</h1>
                            <p>Able to carry 2 standard UK pallets. Total Payload 900kg.</p>
                            <button class="btn btn-primary van-card-btn">
                                REQUEST Booking <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="van-status-card">
                    <div class="left">
                        <div class="van-status-number">900kg</div>
                        <div class="underline"></div>
                        <div class="van-status-label">TOTAL PAYLOAD</div>
                    </div>
                    <div class="right">
                        <div class="van-status-number">02</div>
                        <div class="underline"></div>
                        <div class="van-status-label">UK STD PALLETS</div>
                    </div>
                </div>
            </div>
            <div class="van-card">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <img src="{{ asset('image/long-wheel-van.png') }}" alt="Small Van" class="van-card-img">
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="van-card-content">
                            <h1 class="title-bottom-line">Long Wheel Base Van</h1>
                            <p>Able to carry up to 3 standard UK pallets. Total Payload 1,300kg</p>
                            <button class="btn btn-primary van-card-btn">
                                REQUEST Booking <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="van-status-card">
                    <div class="left">
                        <div class="van-status-number">1300kg</div>
                        <div class="underline"></div>
                        <div class="van-status-label">TOTAL PAYLOAD</div>
                    </div>
                    <div class="right">
                        <div class="van-status-number">02</div>
                        <div class="underline"></div>
                        <div class="van-status-label">UK STD PALLETS</div>
                    </div>
                </div>
            </div>
            <div class="van-card van-card-reverse">
                <div class="row align-items-center flex-md-row-reverse">
                    <div class="col-lg-6 col-12">
                        <img src="{{ asset('image/long-wheel-van.png') }}" alt="Small Van" class="van-card-img">
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="van-card-content">
                            <h1 class="title-bottom-line">Extra Long Wheel Base Vans</h1>
                            <p>Able to carry up to 4 standard UK pallets. Total Payload 1,100kg</p>
                            <button class="btn btn-primary van-card-btn">
                                REQUEST Booking <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="van-status-card">
                    <div class="left">
                        <div class="van-status-number">1100kg</div>
                        <div class="underline"></div>
                        <div class="van-status-label">TOTAL PAYLOAD</div>
                    </div>
                    <div class="right">
                        <div class="van-status-number">04</div>
                        <div class="underline"></div>
                        <div class="van-status-label">UK STD PALLETS</div>
                    </div>
                </div>
            </div>
            <div class="van-card">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <img src="{{ asset('image/lutton-van.png') }}" alt="Small Van" class="van-card-img">
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="van-card-content">
                            <h1 class="title-bottom-line">Luton Vans</h1>
                            <p>Able to carry up to 6 standard UK pallets. Total Payload up to 900kg. Tail Lifts Available</p>
                            <button class="btn btn-primary van-card-btn">
                                REQUEST Booking <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="van-status-card">
                    <div class="left">
                        <div class="van-status-number">900kg</div>
                        <div class="underline"></div>
                        <div class="van-status-label">TOTAL PAYLOAD</div>
                    </div>
                    <div class="right">
                        <div class="van-status-number">06</div>
                        <div class="underline"></div>
                        <div class="van-status-label">UK STD PALLETS</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Slanted section --}}
    @include('website.common-section.slanted')
    {{-- Offices section --}}
    @include('website.common-section.offices', ['wrapperClass' => 'mt-5'])
@endsection
