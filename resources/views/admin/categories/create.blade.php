@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-4 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
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
    {{-- @dd($categories) --}}
    <div class="row">
        <div class="col">
            {{-- column to display draggable category list --}}

            <div class="card mb-4 p-2">
                <div class="card-body">
                    <h5 class="card-title">Draggable Category List</h5>
                    <p class="card-text">Drag and drop to change the display order of categories.</p>
                    {{-- altert for success --}}
                    <div id="alert-success" class="alert alert-success alert-dismissible fade show d-none" role="alert">
                        <span></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    {{-- alert for error --}}
                    <div id="alert-danger" class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                        <span></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div id="dragCategoryList">
                        @include('admin.categories.partials.category_list')
                    </div>
                </div>
            </div>

        </div>
        <div class="col">
            <div class="card mb-4 p-2">

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                        @csrf


                        <!-- Basic Information -->
                        <fieldset class="border p-3 rounded mb-4">
                            <legend class="fw-bold text-primary">Basic Information</legend>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label fw-bold">Slug (Auto-generated)</label>
                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ old('slug') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="parent_id" class="form-label fw-bold">Parent Category (Optional)</label>
                                <select name="parent_id" id="parent_id" class="form-select">
                                    <option value="">None</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- text area input for description --}}

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea name="description" id="description" class="form-control"
                                    rows="3">{{ old('description') }}</textarea>
                            </div>
                            


                        </fieldset>

                        <!-- SEO Metadata -->
                        <fieldset class="border p-3 rounded mb-4">
                            <legend class="fw-bold text-success">SEO Metadata</legend>

                            <div class="mb-3">
                                <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control"
                                    value="{{ old('meta_title') }}">
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control" rows="2">{{ old('meta_description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label fw-bold">Meta Keywords
                                    (Comma-Separated)</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control"
                                    value="{{ old('meta_keywords') }}">
                            </div>
                        </fieldset>

                        <!-- Additional Settings -->
                        <fieldset class="border p-3 rounded mb-4">
                            <legend class="fw-bold text-danger">Additional Settings</legend>

                         
                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Category Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                                    value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">Active</label>
                            </div>
                        </fieldset>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
