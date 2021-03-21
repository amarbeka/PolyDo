<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'title'      => 'required'
        ];
    }

    public function updateRules() {
        return [
            'title'      => 'required'
            
        ];
    }
 

    /**
     * @return array
     */
    public function messages() {
        return [
            'title.required'      => 'Permission required',          
        ];
    }
}
