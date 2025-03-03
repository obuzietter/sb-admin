@extends('shop.layouts.shop')

@section('title', 'Cart')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Handle</th>
                        </tr>
                    </thead>
                    <tbody id="cart-body">
                        @forelse ($cartItems as $item)
                            <tr data-id="{{ $item->product_id }}" data-price="{{ $item->price }}">
                                <td><img src="{{ asset('storage/' . $item->product_image) }}" alt="product"
                                        class="img-fluid" style="width: 100px;"></td>
                                <td>
                                    <p class="mb-0 mt-4">{{ $item->product_name }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">KES {{ $item->price }}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                                            data-action="decrease">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control form-control-sm text-center border-0"
                                            data-quantity name="quantity" value="{{ $item->quantity }}" readonly>
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border"
                                            data-action="increase">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4" data-total>KES {{ $item->price * $item->quantity }}</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" data-action="remove">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No items in cart</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cartBody = document.getElementById("cart-body");

            cartBody.addEventListener("click", (event) => {
                const button = event.target.closest("button");
                if (!button) return;

                const row = button.closest("tr");
                const price = parseFloat(row.dataset.price);
                const quantityInput = row.querySelector("[data-quantity]");
                const totalElement = row.querySelector("[data-total]");
                let quantity = parseInt(quantityInput.value);

                if (button.dataset.action === "increase") {
                    console.log(quantity);                    
                    quantity += 1;
                } else if (button.dataset.action === "decrease" && quantity > 1) {
                    console.log(quantity);                    
                    quantity -= 1;
                } else if (button.dataset.action === "remove") {
                    row.remove();
                    return;
                }

                quantityInput.value = quantity;
                totalElement.innerText = `KES ${(price * quantity)}`;
            });
        });
    </script>
@endsection
