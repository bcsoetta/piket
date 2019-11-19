<?php

namespace App\Http\Requests;

use App\Jadwal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreJadwalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jadwal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'petugas_id'          => [
                'required',
                'integer',
            ],
            'tugas'               => [
                'required',
            ],
            'bidang_id'           => [
                'required',
                'integer',
            ],
            'seksi_id'            => [
                'required',
                'integer',
            ],
            'lokasi_id'           => [
                'required',
                'integer',
            ],
            'tanggal_awal'        => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tanggal_akhir'       => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'waktu_mulai_kerja'   => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'waktu_selesai_kerja' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'nomor_kontak'        => [
                'required',
            ],
        ];
    }
}
