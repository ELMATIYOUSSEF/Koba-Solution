<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCamionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idcamion'=> 'required|integer',
            'idDriver' => 'required|integer',
            'Camion_type'=>'required|string|max:30',
            'Camion_capacity'=>'required|integer',
            'Camion_location'=>'required|string|max:255',
            'Camion_status'=>'required|string|in:available,unavailable',
        ];
    }
}
