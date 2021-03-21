<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index(){
        return view('setting.index');
    }
    public function profile(){
        return view('setting.profile');
    }
    
    public function change(ChangePasswordRequest $request){
        auth()->user()->update(['password'=> Hash::make($request->new_password)]);
         return redirect()->back()->with( [
             'message'    => 'Password Change Successfully',
             'success' => 'success',
         ] );
     }

     public function profileChange(ProfileRequest $request){
        auth()->user()->update(['name'=> $request->name]);
         return redirect()->back()->with( [
             'message'    => 'Profile Change Successfully',
             'success' => 'success',
         ] );
     }
}
