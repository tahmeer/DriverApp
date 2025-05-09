@extends('website.layout')
@section('section')
    {{-- Inner Banner --}}
    @include('website.common-section.inner-banner', [
        'title' => 'Contact us',
        'description' =>
            'For more information on our courier services, please call, email or fill in the enquiry box provided below.',
    ])
    {{-- Offices section --}}
    @include('website.common-section.offices')

    {{-- sector section --}}
    <section class="contact-us-sec">
        <div class="container">
            <h2 class="form-title text-center">Send an enquiry</h2>
            <form>
                <div class="row">
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
                    <div class="col-md-6 col-12 mb-3">
                        <label for="workArea" class="form-label">Vehicle Required</label>
                        <select class="form-select" id="workArea" required>
                            <option selected disabled>Please Select</option>
                            <option>Extra Long Wheel Base Van</option>
                            <option>Long Wheel Base Van</option>
                            <option>Management</option>
                            <option>Short Wheel Base Van</option>
                            <option>Small Van</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="workArea" class="form-label">How did you hear about us?</label>
                        <select class="form-select" id="workArea">
                            <option selected disabled>Please Select</option>
                            <option>Search Engine</option>
                            <option>Word Of Mouth </option>
                            <option>Management</option>
                            <option>Advertisement</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
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

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="4"></textarea>
                </div>

                <div class="communication-box mb-4">
                    <h6 class="mb-3">lease note, our info@cargo2go.com & email@cargo2go.com are not 100% monitored between
                        5:30pm to 7am weekdays and across weekends. For out of office hour enquiries, please call the main
                        office number which is manned 24/7 on 0161 273 7733</h6>
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
