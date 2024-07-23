<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        // $img_path = Storage::put('upload', $data['image']);
        $img_path = $request->hasFile('image') ? Storage::put('upload', $data['image']) : null;

        $project = new Project();

        $project->fill($data);

        $slug = Str::of($project->title)->slug('-');

        $project->slug = $slug;
        $project->image = $img_path;
       
        $project->save();

        return redirect()->route('admin.projects.show', $project);

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
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        // $img_path = Storage::put('upload', $data['image']);
        $img_path = $request->hasFile('image') ? Storage::put('upload', $data['image']) : null;
  
        $project->update($data); //* va dopo l'aggiornamento slug se no devo inserire anche il save()

        $slug = Str::of($project->title)->slug('-');

        $project->slug = $slug;
        $project->image = $img_path;

        $project->save();

        return redirect()->route('admin.projects.show', $project);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        if($project->image) {
            Storage::delete($project->image);
        }

        return redirect()->route('admin.projects.index');

    }
}
