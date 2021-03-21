<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Traits\ProjectTrait;
use App\Models\Project;

class ProjectController extends Controller
{
    use ProjectTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      abort_if(Gate::denies('Project_Access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $projects = Project::latest()->paginate(6);
       return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      abort_if(Gate::denies('Project_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
      abort_if(Gate::denies('Project_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->insertNewProject($request);
        return redirect()->route('project.index')->with( [
            'message'    => 'Create Project',
            'success' => 'success',
        ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      abort_if(Gate::denies('Project_Access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      $project = Project::findorFail($id);
     return view('project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      abort_if(Gate::denies('Project_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $project = Project::findorFail($id);
       return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
     abort_if(Gate::denies('Project_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->updatedProject($request,$id);
        return redirect()->route('project.index')->with( [
            'message'    => 'Project Update',
            'success' => 'success',
        ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
      abort_if(Gate::denies('Project_Completed'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->completeProject($id);
        return redirect()->back()->with( [
            'message'    => 'Project Completed',
            'success' => 'success',
        ] ); 
    }

    public function destroy($id)
    {
      abort_if(Gate::denies('Project_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deleteProject($id);
        return redirect()->back()->with( [
            'message'    => 'Project Deleted',
            'success' => 'success',
        ] ); 
    }
}
