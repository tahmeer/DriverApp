@extends('website.layout')
@section('section')
    {{-- Inner Banner --}}
    @include('website.common-section.inner-banner', [
        'title' => 'Can we help?',
        'description' => 'Here are just a few of the industry sectors we specialise in',
    ])

    {{-- sector section --}}
    <section class="sector-section">
        <div class="container">
            <!-- Introduction Paragraph -->
            <p class="ss-main-content">
                Specialist components require specialist logistics to ensure that they arrive at the destination in the same
                condition they left the factory in. We work with some of the country's leading engineers, telecoms companies
                and network providers helping them distribute their specialist equipment to their client base.
            </p>

            <!-- Sector Cards -->
            <div class="row">
                <!-- Hi-Tec Engineering -->
                <div class="col-md-6 col-12">
                    <div class="sector-card card">
                        <div class="icon-container">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>Hi-Tec Engineering</h3>
                            <p class="card-text" id="cardText1">
                                Potential improvements require special equipment to reduce costs by optimizing operations in
                                the same operating area.
                                In this study, we conducted a first assessment of the country's global progress towards
                                improving our operational position.
                                Happy times and built their expertise elsewhere to meet other issues. We provide
                                comprehensive solutions for all engineering needs.
                            </p>
                            <button class="btn btn-secondary mt-3 btn-expand" onclick="toggleText(event, 'cardText1')">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Construction Industry -->
                <div class="col-md-6 col-12">
                    <div class="sector-card card">
                        <div class="icon-container">
                            <i class="fas fa-hard-hat"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>Construction Industry</h3>
                            <p class="card-text" id="cardText2">
                                We serve the construction industry with many of the UK's leading builders' merchants, steel
                                fabricators, timber merchants, shopfitters and specialist manufacturers using us daily. We
                                specialise in early starts, timed deliveries and site specific deliveries ensuring goods get
                                to site in one piece and on time, reducing downtime and wasted man hours.
                            </p>
                            <button class="btn btn-secondary mt-3 btn-expand" onclick="toggleText(event, 'cardText2')">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Supply Chain -->
                <div class="col-md-6 col-12">
                    <div class="sector-card card">
                        <div class="icon-container">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>Supply Chain</h3>
                            <p class="card-text" id="cardText3">
                                Modern supply chain and production techniques often require just in time or express
                                deliveries to move product or service from supplier to customer. We move all sorts of
                                components, manufactured goods, replacement parts and finished items all around the country.
                                We ensure stock is delivered on time, improving your customer service and inventory
                                management.
                            </p>
                            <button class="btn btn-secondary mt-3 btn-expand" onclick="toggleText(event, 'cardText3')">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Print & Design -->
                <div class="col-md-6 col-12">
                    <div class="sector-card card">
                        <div class="icon-container">
                            <i class="fas fa-print"></i>
                        </div>
                        <div class="card-body text-center">
                            <h3>Print & Design</h3>
                            <p class="card-text" id="cardText4">
                                The internet has enabled a boom in print & media design, much of which still has to be
                                physically delivered. We specialise in timed deliveries, last minute rush jobs, sample
                                deliveries and all other types of day to day print run deliveries.
                            </p>
                            <button class="btn btn-secondary mt-3 btn-expand" onclick="toggleText(event, 'cardText4')">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function toggleText(event, cardId) {
            event.preventDefault(); // Prevent default anchor behavior
            const textElement = document.getElementById(cardId);
            const button = event.target;

            textElement.classList.toggle('expanded');

            if (textElement.classList.contains('expanded')) {
                button.textContent = 'Show Less';
            } else {
                button.textContent = 'Learn More';
            }
        }
    </script>
@endpush
