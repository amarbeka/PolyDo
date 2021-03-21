@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  <a href="{{ route('task.index') }}" class="btn btn-primary">Back to Task</a></div>

                <div class="card-body">
                  
        
                  
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold" for="title">Title : </label>
                   {{$task->title}}
                           
                       </div>
                    <div class="form-group">
                     <label class="form-control-label font-weight-bold" for="description">Description :</label>
                     {{$task->description}} 
                        
                    </div>
                    <div class="form-group">
                      <label class="form-control-label font-weight-bold" for="project">Project :</label>
                 
                               @foreach($project as $id => $project)
                               @if($project->id == $task->project_id){{ $project->title }}@endif
                               @endforeach
                   
                  </div>
                  <div class="form-group">
                    <label class="form-control-label font-weight-bold" for="start_at">Start at :</label>
                    {{$task->start_at }}
                   </div>
                   <div class="form-group">
                    <label class="form-control-label font-weight-bold" for="end_at">End at :</label>
                   {{$task->end_at}}  
                       
                   </div>
                            @if($task->finish_at == null ) 
                              <form action="{{ route('task.completeTask',$task->id) }}" method="POST">
                                @csrf
                              <button type="submit" class="btn btn-outline-success">Mark As Complete Task</button>   
                              </form>
                              @else 
                              <form action="{{ route('task.completeTask',$task->id) }}" method="POST">
                                @csrf
                              <button type="submit" class="btn btn-outline-danger">Mark As Incomplete Task</button>   
                              </form>
                              @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
