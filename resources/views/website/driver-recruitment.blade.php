@extends('website.layout')
@section('section')
    {{-- Inner Banner --}}
    @include('website.common-section.inner-banner', [
        'title' => 'Driver Recruitment',
        'description' =>
            'Ever thought of becoming a van driver? We are always looking for reliable and hard-working drivers to come and join our growing fleet. Contact us to find out more.',
    ])
    <!-- Introduction Paragraph -->
    <section class="driver-recruitment-content">
        <div class="container">
            <p class="dr-cm-1">
                Are you currently a van driver or have ever thought of becoming a van driver or a courier driver? Cargo2Go
                has courier work for van drivers and courier drivers and can provide you with consistent work throughout the
                year. Our work includes single drop courier work and multi-drop courier work. The courier work suits van
                drivers with or without experience. We will train you to become a professional van driver as you become part
                of one the north’s leading same day courier van driver networks.
            </p>
            <p class="mb-0">
                If you are interested in van driver courier work with Cargo2Go and want to know what opportunities we have,
                please get in touch via any of the numbers or complete the form below.
            </p>

        </div>
    </section>
    {{-- Offices section --}}
    @include('website.common-section.offices')

    {{-- sector section --}}
    <section class="driver-recruitment-sec">
        <div class="container">
            <h2 class="form-title text-center">Join our team</h2>
            <form>
                <div class="row mb-4">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="firstName" class="form-label required-field">First Name</label>
                        <input type="text" class="form-control" id="firstName" required>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="lastName" class="form-label required-field">Last Name</label>
                        <input type="text" class="form-control" id="lastName" required>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="email" class="form-label required-field">Email Address</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="telephone" class="form-label required-field">Telephone</label>
                        <input type="tel" class="form-control" id="telephone" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="workArea" class="form-label">Area you want to work in</label>
                    <select class="form-select" id="workArea">
                        <option selected disabled>Select an area</option>
                        <option>Logistics</option>
                        <option>Customer Service</option>
                        <option>Management</option>
                        <option>Driving</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="4"></textarea>
                </div>

                <div class="communication-box mb-4">
                    <p class="privacy-text">By contacting us you agree to our terms and conditions and privacy policy
                    </p>

                    <h6 class="mb-3">Communication</h6>
                    <p class="privacy-text">We'd like to occasionally send you future updates about our services by
                        email. We never send on your details to other companies for marketing purposes and you can
                        unsubscribe at any time.</p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="communication" id="communicationYes">
                        <label class="form-check-label" for="communicationYes">
                            Yes please, I'd like to hear from you about your services
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-2"></i> SEND
                </button>
            </form>
        </div>
    </section>
@endsection

@push('script')
    <script></script>
@endpush
