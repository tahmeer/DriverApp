    <!-- Hero Banner -->
    <section class="inner-banner">
        <img src="{{ asset('image/Banner-1.jpg') }}" alt="Cargo Truck" />
        <div class="container">
            <div class="inner-banner-content">
                <h1>{{ $title ?? 'Title' }}</h1>
                <p>{{ $description ?? 'Description here...' }}</p>
            </div>
        </div>
    </section>
