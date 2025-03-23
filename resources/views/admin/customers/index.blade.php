@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Customers</li>
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
                <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Add Customer
                </a>
                <a href="" class="btn btn-warning">
                    <i class="fa-solid fa-file-export"></i> Export
                </a>
                <a href="" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i> Delete Bulk
                </a>
            </div>

            <!-- Search Field -->
            <form action="{{ route('admin.customers.search') }}" method="GET" class="d-flex gap-2 align-items-center justify-content-end flex-grow-1">
                <input type="search" name="search" class="form-control" placeholder="Search by Name | Email | Phone"
                    value="{{ request('search') }}" style="min-width: 200px; max-width: 300px;">
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Operations</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Operations</th>
                    </tr>
                    <tr>
                        <td colspan="7">{{ $customers->links('pagination::bootstrap-5') }}</td>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->user_type }}</td>
                            <td class="">

                                <div class="d-flex gap
                                -2">
                                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST"
                                        class="delete-form" id="{{ $customer->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn"
                                            onclick="deleteCustomer({{ $customer->id }})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                    @empty
                        <tr>
                            <td colspan="7">No Customers found</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>


@endsection
