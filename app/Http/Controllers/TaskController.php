<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Traits\TaskTrait;
use App\Models\Task;
use App\Models\Project;

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
       $tasks = Task::latest()->paginate(12);
       return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      abort_if(Gate::denies('Task_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      $project = Project::all()->pluck( 'title', 'id' );
       return view('task.create',compact('project'));
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
        return redirect()->route('task.index')->with( [
            'message'    => 'Create Task',
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
      abort_if(Gate::denies('Task_Access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      $task = Task::findorFail($id);
      $project = Project::all();
     return view('task.show',compact('task','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      abort_if(Gate::denies('Task_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $task = Task::findorFail($id);
        $project = Project::all();
       return view('task.edit',compact('task','project'));
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
        return redirect()->route('task.index')->with( [
            'message'    => 'Task Update',
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
       abort_if(Gate::denies('Task_Completed'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $this->completeTask($id);
         return redirect()->back()->with( [
             'message'    => 'Task Completed',
             'success' => 'success',
         ] ); 
     }
     public function destroy($id)
     {
      abort_if(Gate::denies('Task_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deleteTask($id);
        return redirect()->route('task.index')->with( [
            'message'    => 'Task Deleted',
            'success' => 'success',
        ] ); 
    }
  
}
