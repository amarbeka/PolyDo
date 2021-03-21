@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                  <form action="{{route('users.update',$users->id)}}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                            
                            <label class="form-control-label" for="name">Name</label>
                          <input type="text" name="name"  id="name" value="{{ old('name', isset($users) ? $users->name : '') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" required>
                          @if($errors->has('name'))
                          <em class="invalid-feedback">
                              {{ $errors->first('name') }}
                          </em>
                            @endif  
                            
                        </div>
                        <div class="form-group">
                              
                          <label class="form-control-label" for="email">email</label>
                        <input type="email" name="email"  id="email" value="{{ old('email', isset($users) ? $users->email : '') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" required>
                        @if($errors->has('email'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </em>
                          @endif  
                          
                      </div>
    
                      <div class="form-group">
                        <label class="form-control-label"  for="password">Password</label>
                        <input id="password" name="password"  value="{{ old('password') }}" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="Password">
                        @if($errors->has('password'))
                        <em class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </em>
                          @endif  
                      </div>
               
                  
                      <div class="form-group">
                        <label class="form-control-label" for="password_confirmation">Password again</label>
                        <input id="password_confirmation"  class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation"   type="password">
                       
                      </div>
                      <div class="form-group">
                                     
                                     
                        <label class="form-control-label" for="roles">Roles</label>    
                        <select  name="roles" class="form-control {{ $errors->has('roles') ? 'is-invalid' : '' }}">
                          <option value="">Roles</option>
                          @foreach($roles as $id => $roles)
                          <option value="{{ $id }}" @if($users->roles->contains($id) == $id) selected @elseif(old('roles') == $id) selected @endif >{{ $roles }}</option>
                          @endforeach
                      
                        </select>
                        @if($errors->has('roles'))
                        <em class="invalid-feedback">
                            {{ $errors->first('roles') }}
                        </em>
                          @endif 
                    </div>
                      <div class="col-lg-12 mt-2">
                        <div class="form-group">
                         <button type="submit" id="save" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                   </div>
                 </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
