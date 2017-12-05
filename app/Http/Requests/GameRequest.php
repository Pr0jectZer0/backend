<?php

namespace App\Http\Requests;

use App\Genre;
use App\Publisher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GameRequest extends FormRequest
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
        $genres = Genre::all()->pluck('id')->toArray();
        $publisher = Publisher::all()->pluck('id')->toArray();

        return [
            'id_genre' => [
                'required',
                Rule::in($genres)
            ],
            'id_publisher' => [
                'required',
                Rule::in($publisher)
            ],
            'name' => 'required',
            'beschreibung' => 'required',
        ];

    }
}
