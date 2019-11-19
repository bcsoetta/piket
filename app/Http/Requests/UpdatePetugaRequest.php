<?php

namespace App\Http\Requests;

use App\Petuga;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePetugaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('petuga_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nama' => [
                'required',
            ],
            'nip'  => [
                'required',
                'unique:petugas,nip,' . request()->route('petuga')->id,
            ],
        ];
    }
}
