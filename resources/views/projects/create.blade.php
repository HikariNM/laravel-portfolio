@extends('layouts.project')
{{-- @dd($technologies) --}}
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Create New Project</h1>
        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="fa-solid fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label fw-bold">Project Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Ex: E-commerce Website" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug" class="form-label fw-bold">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" placeholder="ecommerce-website" required>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="type" class="form-label fw-bold">Type</label>
                        <select type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" " placeholder="Project Type" required>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                        
                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="url_repo" class="form-label fw-bold">Repository URL</label>
                        <input type="url" class="form-control @error('url_repo') is-invalid @enderror" id="url_repo" name="url_repo" value="{{ old('url_repo') }}" placeholder="https://github.com/username/repo">
                        @error('url_repo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="technlogies" class="form-label fw-bold">Used Technlogies</label>
                        <div>
                            @foreach ($technologies as $tech)
                                <input type="checkbox" name="techs[]" value="{{$tech->id}}" id="tech-{{$tech->id}}">
                                <label for="tech-{{$tech->id}}" class="form-label fw-bold me-2">{{$tech->name}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="short_description" class="form-label fw-bold">Short Description</label>
                        <input type="text" class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" value="{{ old('short_description') }}" placeholder="A brief summary of the project">
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-4">
                        <label for="description" class="form-label fw-bold">Full Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Detailed project information...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-light px-4">Reset Fields</button>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Save Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection