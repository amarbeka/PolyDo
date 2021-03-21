@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users Lists') }}</div>
                @include('alerts.alerts')
                <div class="card-body">
                  <a href="{{ route('users.create') }}"  class="m-2 float-right btn btn-success">Add New User + </a>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($user as $key =>  $item)        
                          <tr>
                            
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                              @foreach ($item->roles as $roles)
                              <span class="badge badge-success "> {{$roles->title}}</span>    
                              @endforeach
                           </td>
                            <td><a href="{{ route('users.edit',$item->id) }}" class="btn btn-primary m-1 d-inline">Edit</a>
                              <form action="{{ route('users.destroy',$item->id) }}" class="d-inline"  method="post">
                                @method('delete')
                                @csrf
                              <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                         </tbody>
                      </table>
                      {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
