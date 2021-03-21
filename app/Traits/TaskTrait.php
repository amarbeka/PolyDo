<?php
namespace App\Traits;
use App\Models\Task;
use Carbon\Carbon;
trait TaskTrait
{
    public function insertNewTask( $request ) {
        auth()->user()->task()->create($request->all());
}
    public function updatedTask( $request,$id ) {
      
    Task::findOrFail($id)->update($request->all());
    }

    public function massDeleteTask( $request ) {
        Task::whereIn('id', $request->ids)->delete(); //For permanently  use => forceDelete(); 
    }

    public function deleteTask($id) {
        Task::findOrFail($id)->delete();
    }

      public function completeTask($id) {
        $task = Task::findOrFail($id);
        if($task->finish_at == null){
            $task->finish_at = Carbon::now();
        }else{
            $task->finish_at =null;
        }
        $task->user_id  = auth()->user()->id;
        $task->save();
    }
    }