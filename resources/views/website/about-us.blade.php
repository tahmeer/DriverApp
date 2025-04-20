@extends('website.layout')
@section('section')
    {{-- Inner Banner --}}
    @include('website.common-section.inner-banner', [
        'title' => 'About Us',
        'description' => 'We can move anything for you from a small packet to multiple pallets. We also specialise in the movement of high value and fragile goods.',
    ])

    {{-- about page section --}}
    <section class="about-section">
        <div class="container">
            <p class="as-main-content">Founded in Manchester in 2006, Cargo2Go has grown to become one of the north’s leading Same Day couriers. The group runs an extensive fleet of vans and wagons, with strong presence across the North’s major towns & cities and the M62 corridor. We employ over 30 people and have long standing relationships in place with many of the UK’s leading transport  firms.</p>

            <div class="row align-items-center">
                <div class="col-md-6 col-12">
                    <div class="as-img">
                        <img src="{{asset('image/about-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="as-content">
                        <h1 class="title-bottom-line">National Reach</h1>
                        <p class="mb-0">Cargo2Go offers you a rapid response and collection service, from anywhere in the UK. We do not use call centres and our offices are staffed by trained and knowledgeable traffic managers.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center flex-md-row-reverse">
                <div class="col-md-6 col-12">
                    <div class="as-img">
                        <img src="{{asset('image/exp-image-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="as-content">
                        <h1 class="title-bottom-line">Credibility</h1>
                        <p class="mb-0">Still privately owned and run day-to-day by its directors, we serve all types of customer, large and small, from blue-chip multi-nationals to local sole traders. We handle hundreds of bookings per day, many at very short notice, and ensure that the jobs are seen through to completion, with a signed POD. Companies rely on us to ensure their goods get to where they need to, enabling deadlines to be met and promises to be kept</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 col-12">
                    <div class="as-img">
                        <img src="{{asset('image/about-2.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="as-content">
                        <h1 class="title-bottom-line">Breadth of Service</h1>
                        <p class="mb-0">By choosing Cargo 2 Go, you will have access to all commercial vehicles, from small vans through to artics, plus specialist vehicles such as flat beds, moffets and hiabs.</p>
                        <p class="mb-0">One phone call covers all your requirements and a single bill covers your invoicing.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center flex-md-row-reverse">
                <div class="col-md-6 col-12">
                    <div class="as-img">
                        <img src="{{asset('image/exp-image-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="as-content">
                        <h1 class="title-bottom-line">Account Management</h1>
                        <p class="mb-0">Knowledgeable staff are always on hand to assist with whatever requirement you may have. Should you need site visits or a transport evaluation, we will arrange for your account manager to visit to assess your requirement, and advise as to the best option. Become a frequent booker with us and you will receive regular site visits to ensure all is going well and we are serving you in the right way. We strive to understand our customers’ needs and to develop meaningful relationships with them. Our goal is to become not just a supplier, but your trusted advisor</p>
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
