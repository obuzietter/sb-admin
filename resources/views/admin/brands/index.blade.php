@extends('layouts.admin')

@section('title', 'Brands')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Brands</li>
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
                <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Add Brand
                </a>
                <a href="" class="btn btn-warning">
                    <i class="fa-solid fa-file-export"></i> Export
                </a>
                <a href="" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i> Delete Bulk
                </a>
            </div>

            <!-- Search Field -->
            <form action="{{ route('admin.brands.search') }}" method="GET" class="d-flex gap-2 align-items-center">
                <input type="search" name="search" class="form-control" placeholder="Search by name or slug"
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

                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>

                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse($brands as $brand)
                        <tr>


                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->description }}</td>
                            <td><img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" width="50px">
                            </td>

                            <td>
                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST"
                                    class="delete-form d-inline" id="{{ $brand->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn" onclick="deleteBrand({{ $brand->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No brands found</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteBrand(catID) {
            event.preventDefault(); // Prevent form submission
            
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
                    
                    console.log('Delete button clicked');
                    console.log(catID);
                    console.log(document.getElementById(catID));
                    document.getElementById(catID).submit();                                       
                }
            });
        }
    </script>


@endsection
