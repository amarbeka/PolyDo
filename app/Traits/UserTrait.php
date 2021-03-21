<?php
namespace App\Traits;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;

trait UserTrait

{
    public function insertNewUser( $request ) {

 User::create(['name' => $request['name'],
              'email' => $request['email'],
              'password' => Hash::make($request['password']),
              'email_verified_at'      => Carbon::now(),
              ])->roles()->attach( $request->input( 'roles') );
 
}
    public function updatedUser( $request,$user ) {
      
        if($request->password > null){
        $data = ['name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'email_verified_at'      => Carbon::now(),
    ];
        }else{
            $data = ['name' => $request['name'],
                     'email' => $request['email'],
                     'email_verified_at'      => Carbon::now(),
                    ];
        }
    //dd($data['email_verified_at']);
   
    User::findOrFail($user)->update($data);
    User::findOrFail($user)->roles()->sync( $request->input( 'roles', false));
  
    }
    public function userList($id) {
        User::findOrFail(auth()->user()->id)->update(array('email' => $request->email));
    }

    public function changeEmailUser($request) {
        User::findOrFail(auth()->user()->id)->update(array('email' => $request->email));
    }
    public function changePasswordUser($request) {
        User::findOrFail(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
    }
    public function massDeleteUser( $request ) {
        User::whereIn('id', $request->ids)->delete(); //For permanently  use => forceDelete(); 
    }

    public function deleteUser($id) {
        User::findOrFail($id)->delete();
    }
    }