<?php
namespace App\Traits;
use App\Models\Role;

trait RoleTrait
{
    public function insertNewRole( $request ) {
        
    Role::create( $request->all() )->permissions()->attach( $request->input( 'permissions', [] ) );
}
    public function updatedRole( $request,$id ) {
      
    Role::findOrFail($id)->update($request->all());
    Role::findOrFail($id)->permissions()->sync( $request->input( 'permissions', [] , false));
  
    }

    public function massDeleteRole( $request ) {
        Role::whereIn('id', $request->ids)->delete(); //For permanently  use => forceDelete(); 
    }

    public function deleteRole($id) {
        Role::findOrFail($id)->delete();
    }
    }