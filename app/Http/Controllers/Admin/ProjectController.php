<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        // dd($projects);
        return view("projects.index", compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->slug = $data['slug'];
        $newProject->type_id = $data['type'];
        $newProject->url_repo = $data['url_repo'];
        $newProject->short_description = $data['short_description'];
        $newProject->description = $data['description'];

        $newProject->save();

        if ($request->has('techs')) {
            $newProject->technlogies()->attach($data['techs']);
        }
        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)

    /**
     * Route Model Binding:
     * Laravel automatically resolves the {project} ID from the URL into
     * a Project model instance. The type-hint (Project) tells Laravel 
     * to search for the record in the 'projects' table (singular Model -> plural Table).
     */
    public function show(Project $project)
    {
        // dd($project->technlogies);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        // dd($data);
        $project->title = $data['title'];
        $project->slug = $data['slug'];
        $project->type_id = $data['type'];
        $project->url_repo = $data['url_repo'];
        $project->short_description = $data['short_description'];
        $project->description = $data['description'];

        $project->update();
        if ($request->has('techs')) {
            $project->technologies()->sync($data['techs']);
        } else {
            $project->technlogies()->detach();
        }


        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();
        return redirect()->route('projects.index');
    }
}
