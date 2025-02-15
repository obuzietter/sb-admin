@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
        <div class="card-header d-flex justify-content-end align-items-center">

            {{-- table operations --}}
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mx-1"><i class="fa-solid fa-plus"></i>
                Add Category</a>
            <a href="" class="btn btn-warning mx-1"><i class="fa-solid fa-sheet-plastic"></i>Export</a>
            <a href="" class="btn btn-danger mx-1"><i class="fa-solid fa-trash"></i>Delete Bulk</a>


        </div>
        <div class="card-body">
            <table class="" id="datatablesSimple">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Slug</th>
                        {{-- <th>Description</th> --}}
                        <th>Image</th>
                        <th>Display Order</th>
                        <th>Is Active</th>
                        <th>Parent ID</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Slug</th>
                        {{-- <th>Description</th> --}}
                        <th>Image</th>
                        <th>Display Order</th>
                        <th>Is Active</th>
                        <th>Parent ID</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- @dd($categories) --}}
                    @forelse($categories as $category)
                        <tr>
                            <td><input type="checkbox" value="{{ $category->id }}"></td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            {{-- <td>{{ $category->description }}</td> --}}
                            <td><img src="{{ asset('storage/' . $category->image_url) }}" alt="{{ $category->name }}"
                                    style="width: 50px"></td>
                            <td>{{ $category->display_order }}</td>
                            <td>
                                @if($category->is_active == 1)
                                    <span class="badge badge-success" style="color: rgb(0, 186, 0); font-size: 1rem">YES</span>
                                @else
                                    <span class="badge badge-danger" style="color: rgb(254, 30, 30); font-size: 1rem">NO</span>
                                @endif
                            </td>
                            
                            <td>{{ $category->parent_id ?? "-" }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                    class="delete-form d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn" onclick="deletecategory()">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No categories found</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deletecategory() {
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
                    document.querySelector('.delete-form').submit();
                }
            })

        }
    </script>


@endsection
