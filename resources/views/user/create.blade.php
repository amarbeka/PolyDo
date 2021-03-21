@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                  <form action="{{route('users.store')}}" method="post">
                    @csrf
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                            
                            <label class="form-control-label" for="name">Name</label>
                          <input type="text" name="name"  id="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" required>
                          @if($errors->has('name'))
                          <em class="invalid-feedback">
                              {{ $errors->first('name') }}
                          </em>
                            @endif  
                            
                        </div>
                        <div class="form-group">
                              
                          <label class="form-control-label" for="email">Email</label>
                        <input type="email" name="email"  id="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" required>
                        @if($errors->has('email'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </em>
                          @endif  
                          
                      </div>
    
                      <div class="form-group">
                        <label class="form-control-label"  for="password">Password</label>
                        <input id="password" name="password" required  value="{{ old('password') }}" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password">
                        @if($errors->has('password'))
                        <em class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </em>
                          @endif  
                      </div>
               
                  
                      <div class="form-group">
                        <label class="form-control-label" for="password_confirmation">Password Again</label>
                        <input id="password_confirmation" required class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation"   type="password">
                       
                      </div>
                      <div class="form-group">
                                     
                                     
                        <label class="form-control-label" for="roles">Roles</label>          
                        <select  name="roles" class="form-control {{ $errors->has('roles') ? 'is-invalid' : '' }}">
                          <option value="">Roles</option>
                        @foreach ($roles as $item)
                        <option value="{{$item->id}}" @if(old('roles') == $item->id) selected @endif>{{$item->title}}</option>
                        @endforeach
                        </select>
                        @if($errors->has('roles'))
                        <em class="invalid-feedback">
                            {{ $errors->first('roles') }}
                        </em>
                          @endif 
                    </div>

                      </div>
                   
                          
                      <div class="col-lg-12 mt-2">
                        <div class="form-group">
                         <button type="submit"  id="save" class="btn btn-primary">Save</button>
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
