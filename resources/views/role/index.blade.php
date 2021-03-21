@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Roles Lists') }}</div>
                @include('alerts.alerts')
                <div class="card-body">
                  <a href="{{ route('roles.create') }}"  class="m-2 float-right btn btn-success">Add New Role + </a>
                    <table class="table table-striped">
                       <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($roles as $item)
                            <tr>
                                <td><a href="javascript: void(0);" class="text-dark font-weight-bold">{{$item->id}}</a></td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                 
                                    <a href="{{route('roles.edit',$item->id)}}" class="btn btn-primary m-1 d-inline">Edit</a>
                                    
                                   
                                    <form action="{{ route('roles.destroy',$item->id) }}" class="d-inline" method="post">
                                        @method('delete')
                                        @csrf
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                      </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
