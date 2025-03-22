@extends('shop.layouts.shop')

@section('title', 'Home')

@section('content')

    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Checkout Page Start -->
    <div class="container-fluid py-4">
        <div class="container py-2">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('address.store') }}" method="POST">
                @csrf
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="accordion" id="checkoutAccordion">
                            <!-- Billing Details -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="billingHeading">
                                    <button class="accordion-button bg-primary fw-bold fs-5 text-white" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#billingDetails" aria-expanded="true"
                                        aria-controls="billingDetails">
                                        Billing Details
                                    </button>
                                </h2>
                                <div id="billingDetails" class="accordion-collapse collapse show"
                                    aria-labelledby="billingHeading" data-bs-parent="#checkoutAccordion">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6">
                                                <div class="form-item w-100">
                                                    <label class="form-label my-3">First Name<sup
                                                            class="text-danger fw-bold fs-6">*</sup></label>
                                                    <input type="text" class="form-control" id="billing_first_name"
                                                        name="billing_first_name" value="{{ old('billing_first_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-6">
                                                <div class="form-item w-100">
                                                    <label class="form-label my-3">Last Name<sup
                                                            class="text-danger fw-bold fs-6">*</sup></label>
                                                    <input type="text" class="form-control" id="billing_last_name"
                                                        name="billing_last_name" value="{{ old('billing_last_name') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <label class="form-label my-3">Company Name<span>(Optional)</span></label>
                                            <input type="text" class="form-control" id="billing_company"
                                                name="billing_company" value="{{ old('billing_company') }}">
                                        </div>
                                        <div class="row">
                                            <div class="col form-item">
                                                <label class="form-label my-3">Mobile<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="tel" class="form-control" id="billing_mobile"
                                                    name="billing_mobile" value="{{ old('billing_mobile') }}">
                                            </div>
                                            <div class="col form-item">
                                                <label class="form-label my-3">Email Address<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="email" class="form-control" id="billing_email"
                                                    name="billing_email" value="{{ old('billing_email') }}">
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <label class="form-label my-3">Physical Address <sup
                                                    class="text-danger fw-bold fs-6">*</sup></label>
                                            <input type="text" class="form-control" id="billing_address"
                                                name="billing_address" placeholder="House No | Street Name"
                                                value="{{ old('billing_address') }}">
                                        </div>
                                        <div class="row">
                                            <div class="col form-item">
                                                <label class="form-label my-3">Town/City<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="text" class="form-control" id="billing_city"
                                                    name="billing_city" value="{{ old('billing_city') }}">
                                            </div>
                                            <div class="col form-item">
                                                <label class="form-label my-3">Postcode/Zip<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="text" class="form-control" id="billing_zip"
                                                    name="billing_zip" value="{{ old('billing_zip') }}">
                                            </div>
                                        </div>
                                        <div class="form-check my-3">
                                            <input class="form-check-input" type="checkbox"
                                                id="ship_to_different_address" name="ship_to_different_address"
                                                value="1" checked>
                                            <label class="form-check-label" for="ship_to_different_address">Ship to a
                                                different address?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Details -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="shippingHeading">
                                    <button class="accordion-button collapsed bg-primary fw-bold fs-5 text-white"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#shippingDetails"
                                        aria-expanded="false" aria-controls="shippingDetails">
                                        Shipping Details
                                    </button>
                                </h2>
                                <div id="shippingDetails" class="accordion-collapse collapse"
                                    aria-labelledby="shippingHeading" data-bs-parent="#checkoutAccordion">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col form-item">
                                                <label class="form-label my-3">First Name<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="text" class="form-control" id="shipping_first_name"
                                                    name="shipping_first_name" value="{{ old('shipping_first_name') }}">
                                            </div>
                                            <div class="col form-item">
                                                <label class="form-label my-3">Last Name<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="text" class="form-control" id="shipping_last_name"
                                                    name="shipping_last_name" value="{{ old('shipping_last_name') }}">
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <label class="form-label my-3">Company Name<span>(Optional)</span></label>
                                            <input type="text" class="form-control" id="shipping_company"
                                                name="shipping_company" value="{{ old('shipping_company') }}">
                                        </div>
                                        <div class="row">
                                            <div class="col form-item">
                                                <label class="form-label my-3">Mobile<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="tel" class="form-control" id="shipping_mobile"
                                                    name="shipping_mobile" value="{{ old('shipping_mobile') }}">
                                            </div>
                                            <div class="col form-item">
                                                <label class="form-label my-3">Email Address<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="email" class="form-control" id="shipping_email"
                                                    name="shipping_email" value="{{ old('shipping_email') }}">
                                            </div>
                                        </div>
                                        <div class="form-item">
                                            <label class="form-label my-3">Address <sup
                                                    class="text-danger fw-bold fs-6">*</sup></label>
                                            <input type="text" class="form-control" id="shipping_address"
                                                name="shipping_address" placeholder="House Number Street Name"
                                                value="{{ old('shipping_address') }}">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col form-item">
                                                <label class="form-label my-3">Town/City<sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="text" class="form-control" id="shipping_city"
                                                    name="shipping_city" value="{{ old('shipping_city') }}">
                                            </div>
                                            <div class="col form-item">
                                                <label class="form-label my-3">Postcode/Zip <sup
                                                        class="text-danger fw-bold fs-6">*</sup></label>
                                                <input type="text" class="form-control" id="shipping_zip"
                                                    name="shipping_zip" value="{{ old('shipping_zip') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="form-item mt-5">
                            <textarea name="order_notes" class="form-control" spellcheck="false" cols="30" rows="11"
                                placeholder="Order Notes (Optional)">{{ old('order_notes') }}</textarea>
                        </div>
                    </div>
                    {{-- CART SUMMARY --}}
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cartItems as $cartItems)
                                        <tr>
                                            <td>{{ $cartItems->product_name }}</td>
                                            <td>{{ $cartItems->price }}</td>
                                            <td>{{ $cartItems->quantity }}</td>
                                            <td>{{ $cartItems->total_price }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No items in cart</td>
                                        </tr>
                                    @endforelse
                                    <tr class="fw-bold">
                                        <td colspan="3">Subtotal</td>
                                        <td><span class="text-primary">{{ $subTotal }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1"
                                        name="Transfer" value="Transfer">
                                    <label class="form-check-label" for="Transfer-1">Direct Bank Transfer</label>
                                </div>
                                <p class="text-start text-dark">Make your payment directly into our bank account. Please
                                    use your Order ID as the payment reference. Your order will not be shipped until the
                                    funds have cleared in our account.</p>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Payments-1"
                                        name="Payments" value="Payments">
                                    <label class="form-check-label" for="Payments-1">Check Payments</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                        name="Delivery" value="Delivery">
                                    <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                        name="Paypal" value="Paypal">
                                    <label class="form-check-label" for="Paypal-1">Paypal</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById("ship_to_different_address").addEventListener("change", function() {
            let isChecked = this.checked;
            let fields = ["first_name", "last_name", "company", "mobile", "email", "address", "city", "zip"];

            fields.forEach(field => {
                let billingField = document.getElementById("billing_" + field);
                let shippingField = document.getElementById("shipping_" + field);

                if (!isChecked) {
                    shippingField.value = billingField.value;
                    // make all fields readonly
                    shippingField.setAttribute("readonly", true);
                    shippingField.style.backgroundColor = "#f5f5f5";
                } else {
                    // make all fields writable
                    shippingField.removeAttribute("readonly");
                    shippingField.value = "";
                }
            });
        });
    </script>
@endsection
