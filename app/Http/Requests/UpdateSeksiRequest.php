<?php

namespace App\Http\Requests;

use App\Seksi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSeksiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('seksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
