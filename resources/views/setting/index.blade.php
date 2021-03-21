@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>
                @include('alerts.alerts')
                <div class="card-body">
                    <form action="{{route('setting.change')}}" method="post">
                        @csrf
                      
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                 
                                   
                                    <div class="form-group">
                                        <label for="password">Current Password</label>
                                        <input id="password" type="password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}" name="current_password">
                                        @if($errors->has('current_password'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('current_password') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input id="new_password" type="password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}" name="new_password">
                                        @if($errors->has('new_password'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('new_password') }}
                                            </em>
                                        @endif
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="new_confirm_password">Confirm Password</label>
                                        <input id="new_confirm_password" type="password" class="form-control {{ $errors->has('new_confirm_password') ? 'is-invalid' : '' }}" name="new_confirm_password">
                                        @if($errors->has('new_confirm_password'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('new_confirm_password') }}
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
