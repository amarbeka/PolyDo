@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  <a href="{{ route('project.index') }}" class="btn btn-primary">Back to Project</a></div>
                <div class="card-body">

                    <div class="form-group">
                        
                      <h3>{{ $project->title  }}</h3>  
                           
                       </div>
                    <div class="form-group">
                        
                     <label class="form-control-label font-weight-bold" for="description">Description :</label>
                     {{ $project->description  }}
                        
                    </div>

                    <div class="form-group">
                        <label class="form-control-label font-weight-bold" for="start_at">Start at :</label>
                        {{ $project->start_at  }}
                       </div>
                       <div class="form-group">
                        <label class="form-control-label font-weight-bold" for="end_at">End at</label>
                        {{ $project->end_at  }}
                       
                    @isset($project->tasks)
                        @foreach ($project->tasks as $task)
                        <div class="card text-white mt-2 @if($task->finish_at == null ) bg-primary @else bg-success  @endif mb-3 col-12" >
                            <div class="card-header">{{$task->title}}</div>
                            <div class="card-body">
                              <h5 class="card-title">Start at : {{$task->start_at }} - End at :    {{$task->end_at}}</h5>
                              <p class="card-text"> {{$task->description}} </p>

                              @if($task->finish_at == null ) 
                              <form action="{{ route('task.completeTask',$task->id) }}" method="POST">
                                @csrf
                              <button type="submit" class="btn btn-outline-light">Mark As Complete Task</button>   
                              </form>
                              @else 
                              <form action="{{ route('task.completeTask',$task->id) }}" method="POST">
                                @csrf
                              <button type="submit" class="btn btn-outline-light">Mark As Incomplete Task</button>   
                              </form>
                              @endif 
                            </div>
                    </div>
                        @endforeach
                    @endisset
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
