<?php

namespace App\Http\Requests;

use App\Bidang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateBidangRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bidang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama' => [
                'required',
            ],
        ];
    }
}
