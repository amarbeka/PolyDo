<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        
        if ( $this->isMethod( 'post' ) ) {
            return $this->createRules();
        } elseif ( $this->isMethod( 'put' ) ) {
            return $this->updateRules();
        }
    }

    public function createRules() {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required'],
        ];
    }

    public function updateRules() {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
           
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'roles' => ['required'],

        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'name.required'      => 'Name Required',
            'email.required'      => 'Email Required',
            'roles.required'      => 'Role Required',
          
        ];
    }
}
