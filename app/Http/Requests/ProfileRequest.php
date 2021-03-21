<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        }else{
            return back();
        }
    }

    public function createRules() {
        return [
            'name'      => 'required'
        ];
    }
 

    /**
     * @return array
     */
    public function messages() {
        return [
            'name.required'      => 'Name required',          
        ];
    }
}
