<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Traits\UserTrait;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class UserController extends Controller
{
    use UserTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('User_Access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::latest()->paginate(12);
        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     abort_if(Gate::denies('User_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $roles = Role::all();
         return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
     abort_if(Gate::denies('User_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->insertNewUser($request);
        return redirect()->route('users.index')->with( [
            'message'    => 'User Created',
            'success' => 'success',
        ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::FindOrFail($id);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        abort_if(Gate::denies('User_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all()->pluck( 'title', 'id' );
        $users = User::findOrFail($id); 
        return view('user.edit',compact('users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        abort_if(Gate::denies('User_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->updatedUser($request,$id);
        return redirect()->route('users.index')->with( [
            'message'    => 'User Updated',
            'success' => 'success',
        ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
     abort_if(Gate::denies('User_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deleteUser($id);
        return redirect()->back()->with( [
            'message'    => 'User Deleted',
            'success' => 'success',
        ] ); 
    }
}
