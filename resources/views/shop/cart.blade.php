@extends('shop.layouts.shop')

@section('title', 'Cart')

@section('content')
    <!-- ... (existing header code) ... -->

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
                                <td>
                                    <img src="{{ asset('storage/' . $item->product_image) }}" alt="product" class="img-fluid"
                                        style="width: 100px;">
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{ $item->product_name }}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">KES {{ $item->price }}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <!-- Add type="button" to prevent form submission -->
                                        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border"
                                            data-action="decrease" onclick="decreaseQuantity({{ $item->product_id }})">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control form-control-sm text-center border-0"
                                            data-id="{{ $item->product_id }}" name="quantity" value="{{ $item->quantity }}"
                                            readonly>
                                        <!-- Add type="button" to prevent form submission -->
                                        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border"
                                            data-action="increase" onclick="increaseQuantity({{ $item->product_id }})">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4" data-id="{{ $item->product_id }}">KES
                                        {{ $item->price * $item->quantity }}</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" data-action="remove"
                                        onclick="removeItem({{ $item->product_id }})">
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
        // Decrease quantity
        function decreaseQuantity(id) {
            const quantityInput = document.querySelector(`input[data-id="${id}"]`);

            let quantity = parseInt(quantityInput.value);

            if (quantity > 1) {
                quantityInput.value = quantity--;
                updateTotal(quantity, quantityInput);
            } else {
                removeItem(id);
            }

        }

        // Increase quantity
        function increaseQuantity(id) {
            const quantityInput = document.querySelector(`input[data-id="${id}"]`);

            let quantity = parseInt(quantityInput.value);

            quantityInput.value = quantity++;
            updateTotal(quantity, quantityInput);
        }

        // Update total
        function updateTotal(quantity, input) {
            const total = document.querySelector(`p[data-id="${input.getAttribute('data-id')}"]`);
            const price = parseFloat(input.closest('tr').getAttribute('data-price'));
            total.textContent = `KES ${price * quantity}`;

        }

        // Remove item from cart
        function removeItem(id) {
            const item = document.querySelector(`tr[data-id="${id}"]`);

            // ajax to delete item from cart in the cart controller
            fetch(`cart-item-delete/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => {
                if (response.ok) {
                    item.remove();
                    return response.json();
                }
                throw new Error('Something went wrong');
            }).then(data => {
                console.log(data);
            }).catch(error => {
                console.error(error);
            });
        }
    </script>
@endsection
