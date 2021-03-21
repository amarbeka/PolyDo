<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Traits\RoleTrait;
use App\Models\Role;

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
      return new RoleResource(Role::with(['permissions'])->get());
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
       $Role = Role::findorFail($id);
       return new RoleResource($Role);
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
      abort_if(Gate::denies('Role_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deleteRole($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
