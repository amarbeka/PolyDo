<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Traits\PermissionTrait;
use App\Models\Permission;

class PermissionController extends Controller
{
    use PermissionTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      abort_if(Gate::denies('Permission_Access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $permissions = Permission::latest()->paginate(12);
       return view('permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      abort_if(Gate::denies('Permission_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $filename = trans('general.create');
        $breadcrumps = [['name' => trans('general.permissions')],[ 'name' => trans('general.create')]];
       return view('permission.create',compact('filename','breadcrumps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
      abort_if(Gate::denies('Permission_Created'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->insertNewPermission($request);
        return redirect()->route('permissions.index')->with( [
            'message'    => 'Create Permission',
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
      abort_if(Gate::denies('Permission_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission = Permission::findorFail($id);
       return view('permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
     abort_if(Gate::denies('Permission_Updated'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->updatedPermission($request,$id);
        return redirect()->route('permissions.index')->with( [
            'message'    => 'Permission Update',
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
      abort_if(Gate::denies('Permission_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deletePermission($id);
        return redirect()->back()->with( [
            'message'    => 'Permission Deleted',
            'success' => 'success',
        ] ); 
    }
}
