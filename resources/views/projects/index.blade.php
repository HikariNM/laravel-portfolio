@extends('layouts.project')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">My Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary shadow-sm">+ New Project</a>
        </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            {{-- <th class="ps-4">ID</th> --}}
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th class="text-end pe-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            {{-- <td class="ps-4 text-muted">{{$project->id}}</td> --}}
                            <td><span class="fw-bold text-dark">{{$project->title}}</span></td>
                            <td><code>{{$project->slug}}</code></td>
                            <td>{{$project->created_at}}</td>
                            <td>{{$project->type->name}}</td>
                            <td class="text-end pe-4">
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-outline-info me-1">Open</a>
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection