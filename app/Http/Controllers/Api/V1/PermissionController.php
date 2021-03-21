<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
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
      return new PermissionResource(Permission::get());
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
        return response(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $Permission = Permission::findorFail($id);
       return new PermissionResource($Permission);
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
        return response(Response::HTTP_ACCEPTED);
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
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
