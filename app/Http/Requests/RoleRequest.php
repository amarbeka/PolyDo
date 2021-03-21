<?php

Namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'title'         => [
                'required',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'required',
                'array',
            ],
        ];
    }

    public function updateRules() {
        return [
            'title'         => [
                'required',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'required',
                'array',
            ],
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'title.required'      => 'Title required',
            'permissions.required'      => 'Permissions required',
            'permissions.integer'      => 'Permissions integer',
            'permissions.array'      => 'Permissions array',
         
        ];
    }
}
