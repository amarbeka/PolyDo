@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Permission') }}</div>

                <div class="card-body">
                  <form action="{{route('permissions.update',$permission->id)}}"  method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label class="form-control-label" for="title">Title</label>
                      <input type="text" name="title"  id="title" value="{{ old('title', isset($permission) ? $permission->title : '') }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="title" required>
                      @if($errors->has('title'))
                      <em class="invalid-feedback">
                          {{ $errors->first('title') }}
                      </em>
                        @endif  
                        
                    </div>
                 
                        <div class="form-group">
                         <button type="submit"  id="save" class="btn btn-primary">save</button>
                        </div>
                    
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
