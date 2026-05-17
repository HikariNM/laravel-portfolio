@extends('layouts.project')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Edit project</h1>
        <a href="{{ route('admin.types.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="fa-solid fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label fw-bold">Type Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"" placeholder="Type Name" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"" placeholder="Description">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    {{-- <button type="reset" class="btn btn-light px-4">Reset Fields</button> --}}
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Save Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection