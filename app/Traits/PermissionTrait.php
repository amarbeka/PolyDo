<?php
namespace App\Traits;
use App\Models\Permission;

trait PermissionTrait
{
    public function insertNewPermission( $request ) {
        Permission::create($request->all());
}
    public function updatedPermission( $request,$id ) {
        Permission::findOrFail($id)->update($request->all());
    }

    public function massDeletePermission( $request ) {
        Permission:: whereIn('id', $request->ids)->delete(); //For permanently  use => forceDelete(); 
    }

    public function deletePermission($id) {
        Permission::findOrFail($id)->delete();
    }
    }