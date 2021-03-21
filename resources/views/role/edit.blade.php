@extends('layouts.app')
@section('style')
<link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('script')
<script src="{{ asset('select2/js/select2.min.js') }}" ></script>
<script>
  document.addEventListener('turbolinks:before-render', () => {
    $( document ).on('ready turbolinks:load', function() {
    $('.select2').select2();
});
$( document ).on('ready turbolinks:load', function() {
    $("#chkall").click(function(){
        if($("#chkall")){
            $("#permissions > optgroup >  option").prop("selected", "selected");
            $("#permissions").trigger("change");
        }
    });
    $("#unchkall").click(function(){
        if($("#unchkall")){
          $("#permissions > optgroup >  option").prop("selected", "");
          $("#permissions").trigger("change");
        }
    });
});
});
</script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Role') }}</div>

                <div class="card-body">
                  <form action="{{route('roles.update',$role->id)}}"  method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label class="form-control-label" for="title">title</label>
                      <input type="text" name="title"  id="title" value="{{ old('title', isset($role) ? $role->title : '') }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="title')" required>
                      @if($errors->has('title'))
                      <em class="invalid-feedback">
                          {{ $errors->first('title') }}
                      </em>
                        @endif  
                        
                    </div>
              
                    <div class="form-group">
                            permissions<span class="red-text">*</span>
                     
                            <button type="button"  class="btn btn-primary" id="chkall">select all</button>
                            <button type="button"  class="btn btn-primary" id="unchkall">deselect all</button>
                            <br>
                          <select required name="permissions[]"  data-placeholder="choose ..." class="select2 form-control   select2-multiple browser-default mt-2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" id="permissions" multiple="multiple">
                            <optgroup label="permissions">
                            
                              
                                @foreach($permissions as $id => $permissions)
                                            <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                        @endforeach
                            </optgroup>
                          </select>
    
                
                          @if($errors->has('permissions'))
                           <em class="invalid-feedback">
                           {{ $errors->first('permissions') }}
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
