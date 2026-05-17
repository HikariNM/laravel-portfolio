@extends('layouts.project')

@section('content')
<div class="bg-primary text-white py-5 mb-5 shadow">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}" class="text-white-50">Projects</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Project Details</li>
                    </ol>
                </nav>
                <h1 class="display-4 fw-bold">{{ $project->title }}</h1>
                <p class="lead opacity-75">{{ $project->short_description ?? 'No short description available.' }}</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-light shadow-sm">Edit Project</a>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete Project
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4">
                <h3 class="h5 border-bottom pb-3 mb-3 text-secondary text-uppercase">Project Description</h3>
                <p class="fs-5">{{ $project->description }}</p>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4">
                <h3 class="h5 border-bottom pb-3 mb-3 text-secondary text-uppercase">Technical Info</h3>
                <ul class="list-unstyled mb-0">
                    <li class="mb-3">
                        <small class="d-block text-muted">Slug:</small>
                        <span class="badge bg-light text-dark border">{{ $project->slug }}</span>
                    </li>
                    <li class="mb-3">
                        <small class="d-block text-muted">Type</small>
                        <span class="badge bg-light text-dark border">{{ $project->type->name }}</span>
                    </li>
                    <li class="mb-3">
                        <small class="d-block text-muted">Created at:</small>
                        <span class="fw-bold">{{ $project->created_at->format('M d, Y') }}</span>
                    </li>
                    <li class="mb-0">
                        <small class="d-block text-muted">Repository Link:</small>
                        @if($project->url_repo)
                            <a href="{{ $project->url_repo }}" target="_blank" class="text-decoration-none text-break">{{ $project->url_repo }}</a>
                        @else
                            <span class="text-muted">No link provided</span>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want do permanently delete this project from your portfolio?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection