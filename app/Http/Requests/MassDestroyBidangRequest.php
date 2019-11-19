<?php

namespace App\Http\Requests;

use App\Bidang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBidangRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('bidang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:bidangs,id',
        ];
    }
}
