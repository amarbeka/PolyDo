@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Task Lists') }}  
                 @can('Task_Created')
                 <a href="{{ route('task.create') }}"  class="m-2 float-right btn btn-success">Add New Task + </a>
                 @endcan
                </div>         
                @include('alerts.alerts')       
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">Start at</th>
                            <th scope="col">End at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tasks as $key => $item)
                              
                        
                          <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->start_at }}</td>
                            <td>{{ $item->end_at }}</td>
                            <td>
                              @can('Task_Updated')
                              <a href="{{route('task.edit',$item->id)}}" class="btn btn-primary  d-inline">Edit</a>   
                              @endcan
                              @can('Task_Deleted')
                              <form action="{{ route('task.destroy',$item->id) }}" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                              <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                              @endcan
                              @can('Task_Access')
                              <a href="{{ route('task.show',$item->id) }}" class="btn btn-light d-inline">View Task</a>
                              @if($item->finish_at == null ) 
                              <form action="{{ route('task.completeTask',$item->id) }}"  class="d-inline" method="POST">
                                @csrf
                              <button type="submit" class="btn btn-outline-success">Mark As Complete Task</button>   
                              </form>
                              @else 
                              <form action="{{ route('task.completeTask',$item->id) }}"  class="d-inline" method="POST">
                                @csrf
                              <button type="submit" class="btn btn-outline-danger">Mark As Incomplete Task</button>   
                              </form>
                              @endif 
                              @endcan
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
