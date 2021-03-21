<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Traits\TaskTrait;
use App\Models\Task;

class TaskController extends Controller
{
    use TaskTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      abort_if(Gate::denies('Task_Access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      return new TaskResource(Task::latest()->paginate(6));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
      abort_if(Gate::denies('Task_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->insertNewTask($request);
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
       $Task = Task::findorFail($id);
       return new TaskResource($Task);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
     abort_if(Gate::denies('Task_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->updatedTask($request,$id);
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
      abort_if(Gate::denies('Task_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deleteTask($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
