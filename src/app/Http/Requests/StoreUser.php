<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
        
        return [
            "leader_name"           =>      "required",
            "email"                 =>      "required|email|unqiue:users,email",
            "phone_1"               =>      "required",
            "phone_2"               =>      "required",
            "wilaya"                =>      "required",
            "member_2"              =>      "required",
            "member_3"              =>      "required",
            "participations_number" =>      "required|integer"
        ];
    }
}
