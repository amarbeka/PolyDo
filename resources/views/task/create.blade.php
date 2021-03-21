@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  <a href="{{ route('task.index') }}" class="btn btn-primary">Back to Task</a></div>

                <div class="card-body">
                  <form action="{{route('task.store')}}"  method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="title">Title</label>
                         <input type="text" name="title"  id="title" value="{{ old('title') }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Title" required>
                         @if($errors->has('title'))
                         <em class="invalid-feedback">
                             {{ $errors->first('title') }}
                         </em>
                           @endif  
                           
                       </div>
                    <div class="form-group">
                     <label class="form-control-label" for="description">Description</label>
                      <textarea name="description"  id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" required>{{ old('description') }}</textarea>
                      @if($errors->has('description'))
                      <em class="invalid-feedback">
                          {{ $errors->first('description') }}
                      </em>
                        @endif  
                        
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="project">Project</label>
                  <select required name="project_id"  required class="form-control {{ $errors->has('project_id') ? 'is-invalid' : '' }}" id="project_id">
                     
                      <option value="" >Choose Project</option>
                               @foreach($project as $id => $project)
                                      <option value="{{ $id }}" {{ $id == old('project_id') || isset($roles) && $project->project->contains($id) ? 'selected' : '' }}>{{ $project }}</option>
                                  @endforeach
                    </select>
                    @if($errors->has('project_id'))
                     <em class="invalid-feedback">
                     {{ $errors->first('project_id') }}
                     </em>
                    @endif  
                  </div>
                    <div class="form-group">
                        <label class="form-control-label" for="start_at">Start at</label>
                         <input type="date" name="start_at"  id="start_at" value="{{ old('start_at') }}" class="form-control {{ $errors->has('start_at') ? 'is-invalid' : '' }}" placeholder="start_at" required>
                         @if($errors->has('start_at'))
                         <em class="invalid-feedback">
                             {{ $errors->first('start_at') }}
                         </em>
                           @endif  
                           
                       </div>
                       <div class="form-group">
                        <label class="form-control-label" for="end_at">End at</label>
                         <input type="date" name="end_at"  id="end_at" value="{{ old('end_at') }}" class="form-control {{ $errors->has('end_at') ? 'is-invalid' : '' }}" placeholder="end_at" required>
                         @if($errors->has('end_at'))
                         <em class="invalid-feedback">
                             {{ $errors->first('end_at') }}
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
