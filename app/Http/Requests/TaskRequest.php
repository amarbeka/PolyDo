<?php

Namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'description'         => [
                'required',
            ],
            'start_at'         => [
                'required',
            ],
            'end_at'         => [
                'required',
            ],
            'project_id'         => [
                'required',
            ],
        ];
    }

    public function updateRules() {
        return [
            'title'         => [
                'required',
            ],
            'description'         => [
                'required',
            ],
            'start_at'         => [
                'required',
            ],
            'end_at'         => [
                'required',
            ],
            'project_id'         => [
                'required',
                'integer',
            ],
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'title.required'      => 'Title Required',
            'description.required'      => 'Description Required',
            'start_at.required'      => 'Start at Required',
            'end_at.required'      => 'End at Required',
            'project_id.required'      => 'Project Required',
          
        ];
    }
}
