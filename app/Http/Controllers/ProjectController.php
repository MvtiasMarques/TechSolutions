<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::all();
        
        // Si la petición es para API, devolver JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json($projects);
        }
        
        // Para vistas web, pasar los proyectos directamente
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->validated());

        // Si la petición es para API, devolver JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json($project, 201);
        }

        return redirect()->route('projects.index')
                         ->with('success','Proyecto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Project $project)
    {
        // Si la petición es para API, devolver JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json($project);
        }
        
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        // Si la petición es para API, devolver JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json($project);
        }

        return redirect()->route('projects.index')
                         ->with('success','Proyecto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        $project->delete();

        // Si la petición es para API, devolver JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json(['message' => 'Proyecto eliminado exitosamente'], 200);
        }

        return redirect()->route('projects.index')
                         ->with('success','Proyecto eliminado exitosamente.');
    }
}
