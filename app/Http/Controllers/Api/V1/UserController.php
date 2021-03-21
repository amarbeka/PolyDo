<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Traits\UserTrait;
use App\Models\User;

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
      return new UserResource(User::with(['roles'])->get());
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
       $User = User::with(['roles'])->findorFail($id);
       return new UserResource($User);
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
      abort_if(Gate::denies('User_Deleted'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->deleteUser($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
