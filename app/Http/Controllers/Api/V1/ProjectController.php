<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
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
      return new ProjectResource(Project::with(['tasks'])->get());
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
        return response(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $project = Project::findorFail($id);
       return new ProjectResource($project);
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
        return response(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      abort_if(Gate::denies('Project_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deleteProject($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
