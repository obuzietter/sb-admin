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
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
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
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="/shop/img/featur-1.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 $</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="/shop/img/featur-2.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 $</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="/shop/img/featur-3.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 $</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                            </div>
                                        </div>
                                    </div>
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
                        <link rel="stylesheet" type="text/css"
                            href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
                        <div class="col-lg-9">
                            <div class="row g-4">

                                @forelse ($products as $product)
                                    <div class="col-md-6 col-lg-6 col-xl-4 ">
                                        <div class="rounded position-relative fruite-item d-flex flex-column">
                                            <div class="fruite-img">
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white fw-bold bg-danger px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">NEW</div>
                                            <div
                                                class="p-4 rounded-bottom border shadow-sm flex-grow-1 d-flex flex-column justify-content-between bg-white">
                                                <!-- Product Name -->
                                                <h5 class="text-dark fw-semibold mb-3">{{ $product->name }}</h5>

                                                <!-- Price & Cart Button -->
                                                <div
                                                    class="d-flex flex-row justify-content-between align-items-center flex-wrap">
                                                    <span class="text-primary mb-0 text-decoration-underline">
                                                        KSH {{ number_format($product->price, 2) }}
                                                    </span>
                                                    <a href="#"
                                                        class="btn btn-primary rounded-pill d-flex align-items-center"
                                                        onclick="notify()">
                                                        <i class="fa fa-shopping-bag me-2"></i> Add to Cart
                                                    </a>
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
        function notify() {
            Toastify({
                text: "Product added to cart!",
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
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
