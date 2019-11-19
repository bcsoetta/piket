<?php

namespace App\Http\Requests;

use App\Lokasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateLokasiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lokasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
