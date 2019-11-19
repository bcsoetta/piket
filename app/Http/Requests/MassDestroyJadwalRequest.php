<?php

namespace App\Http\Requests;

use App\Jadwal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJadwalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jadwal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jadwals,id',
        ];
    }
}
