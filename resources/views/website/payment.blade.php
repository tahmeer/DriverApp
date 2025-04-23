@extends('website.layout')
@section('section')

    <section class="payment-banner">
        <div class="container">
            <h1>Payment</h1>
        </div>
    </section>
    <section class="payment-section">
        <div class="container">
            <h2>Payment Form</h2>
            <div class="row">
                <div class="col-md-6 col-12 mb-3">
                    <label for="name" class="form-label required-field">Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="email" class="form-label required-field">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="weight" class="form-label required-field">Weight</label>
                    <input type="number" class="form-control" id="weight" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <label for="amount" class="form-label required-field">Amount</label>
                    <input type="number" class="form-control" id="amount" required>
                </div>
                <button type="submit" class="btn btn-primary payment-sec-btn mt-3">
                    <i class="fas fa-paper-plane me-2"></i>
                    COnfirm Payment
                </button>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
    </script>
@endpush
