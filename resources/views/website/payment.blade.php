@extends('website.layout')
@section('section')

    <section class="payment-banner">
        <div class="container">
            <h1>Payment</h1>
        </div>
    </section>
    <section class="payment-section">
        <div class="container">
            <h2 class="mb-5">Payment Form</h2>
            <form action="{{route('payment')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="pickup_location" class="form-label required-field">Pick Up Location</label>
                        <input type="text" class="form-control" id="pickup_location" name="pickup_location" >
                        @error('pickup_location')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="drop_location" class="form-label required-field">Drop Location</label>
                        <input type="text" class="form-control" id="drop_location" name="drop_location" >
                        @error('drop_location')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="delivery_type" class="form-label">Area you want to work in</label>
                        <select name="delivery_type" class="form-select" id="deliveryType">
                            <option selected disabled>Select Option</option>
                            <option value="Cargo">Cargo</option>
                            <option value="Food">Food</option>
                        </select>
                        @error('delivery_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3 d-none" id="weight">
                        <label for="weight" class="form-label required-field">Weight</label>
                        <input name="weight" type="number" class="form-control"  >
                        @error('weight')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="price" class="form-label required-field">Price</label>
                        <input name="price" type="number" class="form-control" id="price" >
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="phone_number" class="form-label required-field">Phone Number</label>
                        <input name="phone_number" type="number" class="form-control" id="phone_number" >
                        @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="note" class="form-label required-field">Note</label>
                        <input name="note" type="text" class="form-control" id="note" >
                        @error('note')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary payment-sec-btn mt-3">
                        <i class="fas fa-paper-plane me-2"></i>
                        Confirm Payment
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('script')
    <script>
        
    </script>
@endpush
