@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
    </nav>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error Messages -->
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
    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <div class="d-flex gap-2">
                <!-- Table Operations -->
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Add Product
                </a>
                <a href="" class="btn btn-warning">
                    <i class="fa-solid fa-file-export"></i> Export
                </a>
                <a href="" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i> Delete Bulk
                </a>
            </div>

            <!-- Search Field -->
            <form action="{{ route('admin.products.search') }}" method="GET" class="d-flex gap-2 align-items-center">
                <input type="search" name="search" class="form-control" placeholder="Search by name or SKU"
                    value="{{ request('search') }}" style="min-width: 200px;">
                <button class="btn btn-outline-success d-flex align-items-center gap-1" type="submit">
                    <i class="fa-solid fa-search"></i> Search
                </button>
            </form>
        </div>

        <div class="card-body">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>

                        <th>SKU</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Special Price</th>
                        <th>Wholesale Price</th>

                        <th>Is Published</th>
                        <th>Is Enabled</th>
                        <th>Is Featured</th>

                        <th>Operations</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Special Price</th>
                        <th>Wholesale Price</th>

                        <th>Is Published</th>
                        <th>Is Enabled</th>
                        <th>Is Featured</th>

                        <th>Operations</th>
                    </tr>
                    <tr>
                        <td colspan="7">{{ $products->links('pagination::bootstrap-5') }}</td>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse($products as $product)
                        <tr>

                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->cost }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->special_price }}</td>
                            <td>{{ $product->whole_sale_price }}</td>

                            <td>
                                @if ($product->is_published == 1)
                                    <span class="badge badge-success bg-success">YES</span>
                                @else
                                    <span class="badge badge-danger bg-danger">NO</span>
                                @endif

                            </td>
                            <td>
                                @if ($product->is_enabled == 1)
                                    <span class="badge badge-success bg-success">YES</span>
                                @else
                                    <span class="badge badge-danger bg-danger">NO</span>
                                @endif
                            </td>
                            <td>
                                @if ($product->is_featured == 1)
                                    <span class="badge badge-success bg-success">YES</span>
                                @else
                                    <span class="badge badge-danger bg-danger">NO</span>
                                @endif
                            </td>

                            <td class="">

                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                        class="delete-form" id="{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn"
                                            onclick="deleteProduct({{ $product->id }})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No products found</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteProduct(productID) {
            //prevent the form from submitting
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(productID).submit();
                }
            })

        }
    </script>


@endsection
