<?php

namespace App\Http\Requests;

use App\Bus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bus_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'             => [
                [
                    'string',
                    'required',
                ],
            ],
            'places_available' => [
                [
                    'required',
                    'integer',
                    'min:-2147483648',
                    'max:2147483647',
                ],
            ],
        ];
    }
}
