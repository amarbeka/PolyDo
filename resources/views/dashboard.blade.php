@extends('layouts.app')
@section('style')
    <style>.card-counter{
      box-shadow: 2px 2px 10px #DADADA;
      margin: 5px;
      padding: 20px 10px;
      background-color: #fff;
      height: 100px;
      border-radius: 5px;
      transition: .3s linear all;
    }
  
    .card-counter:hover{
      box-shadow: 4px 4px 20px #DADADA;
      transition: .3s linear all;
    }
  
    .card-counter.primary{
      background-color: #007bff;
      color: #FFF;
    }
  
    .card-counter.danger{
      background-color: #ef5350;
      color: #FFF;
    }  
  
    .card-counter.success{
      background-color: #66bb6a;
      color: #FFF;
    }  
  
    .card-counter.info{
      background-color: #26c6da;
      color: #FFF;
    }  
  
    .card-counter i{
      font-size: 5em;
      opacity: 0.2;
    }
  
    .card-counter .count-numbers{
      position: absolute;
      right: 35px;
      top: 20px;
      font-size: 32px;
      display: block;
    }
  
    .card-counter .count-name{
      position: absolute;
      right: 35px;
      top: 65px;
      font-style: italic;
      text-transform: capitalize;
      opacity: 0.5;
      display: block;
      font-size: 18px;
    }</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
             
                  <div class="row">
                    @can('Task_Access')
                    <div class="col-md-3">
                      <div class="card-counter primary">
                        <i class="fa fa-code-fork"></i>
                        <span class="count-numbers">{{ App\Models\User::count() }}</span>
                        <span class="count-name">User</span>
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter danger">
                        <i class="fa fa-ticket"></i>
                        <span class="count-numbers">{{ App\Models\Role::count() }}</span>
                        <span class="count-name">Role</span>
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter success">
                        <i class="fa fa-database"></i>
                        <span class="count-numbers">{{ App\Models\Project::whereNotNull('finish_at')->count() }}</span>
                        <span class="count-name">Project Completed</span>
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter info">
                        <i class="fa fa-users"></i>
                        <span class="count-numbers">{{ App\Models\Task::whereNotNull('finish_at')->count() }}</span>
                        <span class="count-name">Task Completed</span>
                      </div>
                    </div>
                    @else
                    <div class="col-md-12">
                    
                      <div class="card-header"><h3 class="text-center">{{ __('PolyDo App') }}</h3></div>
                      <div class="card-body">
                        <img class="rounded mx-auto d-block"  src="{{ asset('images/polydo.png') }}" alt="">
                     </div>
                     <button type="button" class="btn btn-secondary btn-lg btn-block">
                      Wait For Approved by Super Admin
                    </button>
                    </div>
                    @endcan
               
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
