@extends('shop.layouts.shop')

@section('title', 'Products')

@section('content')


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <form action="{{ route('product.search') }}" method="GET" class="input-group w-100 mx-auto d-flex">
                                    @csrf
                                    <input type="search" class="form-control p-3" placeholder="keywords"
                                        aria-describedby="search-icon-1">
                                    <button type="submit" class="btn p-0 border-0 shadow-none"><span
                                            id="search-icon-1" class="input-group-text p-3 px-4 d-inline-block"><i
                                                class="fa fa-search"></i></span>
                                    </button>
                                      
                                </form>

                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="low_price">Lowest Price First </option>
                                    <option value="high_price">Highest Price First</option>
                                    <option value="new_first">Newest First</option>
                                    <option value="old_first">Oldest First</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">

                                            @forelse ($categories as $category)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="bi bi-star-fill"></i>
                                                            {{ $category->name }}</a>
                                                        <span>(3)</span>
                                                    </div>
                                                </li>
                                            @empty
                                                <h1>No categories found</h1>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                            min="0" max="500" value="0"
                                            oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-velue="0" max-value="500"
                                            for="rangeInput">0</output>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Additional</h4>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-1" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-1"> Organic</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-2" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-2"> Fresh</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-3" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-3"> Sales</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-4" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-4"> Discount</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" class="me-2" id="Categories-5" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-5"> Expired</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">Featured products</h4>
                                    @forelse ($featuredProducts as $featuredProduct)
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4"
                                                style="width: 100px; height: 100px; flex-shrink: 0;">
                                                <img src="{{ asset('storage/' . $featuredProduct->image) }}"
                                                    class="img-fluid rounded" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2">{{ $featuredProduct->name }}</h6>
                                                <div class="d-flex mb-2 ">
                                                    <i class="fa fa-star text-primary"></i>
                                                    <i class="fa fa-star text-primary"></i>
                                                    <i class="fa fa-star text-primary"></i>
                                                    <i class="fa fa-star text-primary"></i>
                                                    <i class="fa fa-star text-secondary"></i>

                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="me-2">KES {{ number_format($featuredProduct->price) }}
                                                    </h5>
                                                    {{-- <h5 class="text-danger text-decoration-line-through">4.11 $</h5> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h1>No featured products found</h1>
                                    @endforelse
                                    <div class="d-flex justify-content-center my-4">
                                        <a href="#"
                                            class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                            More</a>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="/shop/img/banner-fruits.jpg" class="img-fluid w-100 rounded"
                                            alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Product Cards --}}
                        <div class="col-lg-9">
                            <div class="row g-4">


                                @forelse ($products as $product)
                                    <div class="col-md-6 col-lg-6 col-xl-4 ">
                                        <div class="rounded position-relative fruite-item d-flex flex-column">
                                            <div class="fruite-img">
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    class="img-fluid rounded-top" alt="">
                                            </div>
                                            <div class="text-white fw-bold bg-danger px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">NEW</div>
                                            <div
                                                class="p-4 rounded-bottom border shadow-sm flex-grow-1 d-flex flex-column justify-content-between bg-white">
                                                <!-- Product Name -->
                                                <a href="{{ route('product.show', ['id' => $product->id]) }}"
                                                    class="text-decoration-none">
                                                    <h5 class="text-dark fw-semibold mb-3">{{ $product->name }}</h5>
                                                </a>


                                                <!-- Price & Cart Button -->
                                                <div
                                                    class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                                    <span class="text-secondary fs-5 fw-bold">
                                                        KSH {{ number_format($product->price, 2) }}
                                                    </span>
                                                    <button class="btn btn-primary rounded-pill d-flex align-items-center"
                                                        onclick="addToCart({{ $product->id }}, '{{ $product->name }}', '{{ $product->image }}', {{ $product->price }})">
                                                        <i class="fa fa-shopping-bag me-2"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                @empty
                                    <h1>No products found</h1>
                                @endforelse
                                <div class="row">
                                    {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
                                    <div class="mt-5">
                                        {{ $products->links('pagination::bootstrap-5') }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
    <script>
        function addToCart(productID, productName, productImage, productPrice, quantity = 1) {
            console.log(productID, productName, productImage, productPrice, quantity);

            let product = {
                id: productID,
                name: productName,
                image: productImage,
                price: productPrice,
                quantity: quantity
            };
            // ajax request to add product to cart

            fetch("{{ route('cart.item.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product: product
                    })
                }).then(response => response.json())
                .then(data => {
                    console.log(data);
                    updateCartCount(data.total_cart_items);
                    showToast();
                })
                .catch(error => {
                    console.error(error);
                });


        }

        function showToast() {
            Toastify({
                text: "Item added to cart!",
                className: "rounded-pill",
                duration: 3000,
                destination: "/cart",
                newWindow: false,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                offset: {
                    x: 10, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                    y: 50 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                },
                style: {
                    background: "linear-gradient(to right, green, green)",
                },
                onClick: function() {} // Callback after click
            }).showToast();

        }

        function updateCartCount(count) {
            document.getElementById('cart-count').innerText = count;
        }
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
