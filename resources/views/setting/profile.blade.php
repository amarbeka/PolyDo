@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Personal Information') }}</div>
                @include('alerts.alerts')
                <div class="card-body">
                    <form action="{{route('setting.profileChange')}}" method="post">
                        @csrf
                      
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                 
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Name</label>
                                      <input type="text" name="name"  id="name" value="{{ old('name', isset(auth()->user()->name) ? auth()->user()->name : '') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="name" required>
                     
                                          @if($errors->has('name'))
                                          <em class="invalid-feedback">
                                              {{ $errors->first('name') }}
                                          </em>
                                            @endif  
                                            
                                        </div>
    

                                </div>


                                <div class="col-lg-12 mt-2">
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-primary">Save</button>
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
