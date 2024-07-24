<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();
        return view('admin.projects.create', compact('types'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validated();

        $project = new Project();
            
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->start_date = $data['start_date'];
        $project->slug = Str::of($project->title)->slug();
        $project->in_progress = $data['in_progress'];
        $project->type_id = $data['type_id'];

        $project->save();

        return redirect()->route('admin.projects.index')->with('status', 'Progetto creato');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $types = Type::all();
        $data = [
            'project' => $project,
            'types' => $types,
        ];
        return view('admin.projects.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $data = $request->validated();
        $slug = Str::of($data['title'])->slug();
        $project->slug = $slug;
        $project->update($data);
        return redirect()->route('admin.projects.show', $project)->with('status', 'Info progetto aggiornate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
