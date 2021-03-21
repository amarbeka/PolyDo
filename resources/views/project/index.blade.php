@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        <div class="col-md-12">
          <div class="card-header bg-white" style="height: 60px;">{{ __('Project List') }}
            @can('Project_Created')
            <a href="{{ route('project.create') }}"  class="mb-1 float-right btn btn-success">Add New Project + </a>
            @endcan
          </div>
         @include('alerts.alerts')
<div class="row mt-2">
  @foreach ($projects as $item)
    <div class="col-sm-6 mb-1">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $item->title }} <span class=" float-right badge badge-primary">{{ App\Models\Task::where('project_id', $item->id)->whereNull('finish_at')->count() }}</span></h5>
          <p class="card-text">{{ $item->description }}</p>
          <p class="card-text">Start At : {{ $item->start_at }} - End At: {{ $item->end_at }}</p>
          @can('Project_Updated')
          @if($item->finish_at == null ) 
          <form action="{{ route('project.completeProject',$item->id) }}" class="d-inline" method="POST">
            @csrf
          <button type="submit" class="btn btn-outline-success">Mark as Complete</button>   
          </form>
          @else
          <form action="{{ route('project.completeProject',$item->id) }}" class="d-inline" method="POST">
            @csrf
          <button type="submit" class="btn btn-outline-danger">Mark as Incomplete</button>   
          </form>
           @endif 
          <a href="{{ route('project.edit',$item->id) }}" class="btn btn-primary d-inline">Edit</a>
          @endcan
          @can('Project_Deleted')
          <form action="{{ route('project.destroy',$item->id) }}" class="d-inline" method="post">
            @method('delete')
            @csrf
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          @endcan
          @can('Project_Access')
          <a href="{{ route('project.show',$item->id) }}" class="btn btn-light">View Project</a>
          @endcan
        </div>
      </div>
    </div>
    @endforeach
    <div class="col-sm-12 mt-2">
    {{ $projects->links() }}
    <div>
  </div>
</div>
</div>
</div>
@endsection

