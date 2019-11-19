<?php

namespace App\Http\Requests;

use App\Petuga;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPetugaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('petuga_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:petugas,id',
        ];
    }
}
