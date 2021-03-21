<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Traits\RoleTrait;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    use RoleTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      abort_if(Gate::denies('Role_Access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $roles = Role::latest()->paginate(12);
       return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      abort_if(Gate::denies('Role_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $permissions = Permission::all()->pluck( 'title', 'id' );
       return view('role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
      abort_if(Gate::denies('Role_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->insertNewRole($request);
        return redirect()->route('roles.index')->with( [
            'message'    => 'Role Created',
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
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      abort_if(Gate::denies('Role_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role = Role::findOrFail($id)->load( 'permissions' ); 
        $permissions = Permission::all()->pluck( 'title', 'id' );
      
       return view('role.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
      abort_if(Gate::denies('Role_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->updatedRole($request,$id);
        return redirect()->route('roles.index')->with( [
            'message' => 'Role Updated',
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
      abort_if(Gate::denies('Role_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deleteRole($id);
        return redirect()->back()->with( [
            'message' => 'Role Deleted',
            'success' => 'success',
        ] ); 
    }
}
