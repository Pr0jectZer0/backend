<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class TerminRequest extends FormRequest
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
    public function rules()
    {

        $users = User::all()->pluck('id')->toArray();

        return [
            'titel' => 'required|max:255',
            'beschreibung' => 'required',
            'end_datum' => 'required', //timestamp
            'start_datum' => 'required', //timestamp
        ];
    }
}
