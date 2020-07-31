<?php

namespace App\Http\Requests;

use App\Bu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bus,id',
        ];
    }
}
