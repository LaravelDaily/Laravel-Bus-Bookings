<?php

namespace App\Http\Requests;

use App\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ride_id' => [
                [
                    'required',
                    'integer',
                ],
            ],
            'name'    => [
                [
                    'string',
                    'required',
                ],
            ],
            'email'   => [
                [
                    'required',
                ],
            ],
            'phone'   => [
                [
                    'string',
                    'required',
                ],
            ],
            'status'  => [
                [
                    'required',
                ],
            ],
        ];
    }
}
