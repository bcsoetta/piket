@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jadwal.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.id') }}
                        </th>
                        <td>
                            {{ $jadwal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.petugas') }}
                        </th>
                        <td>
                            {{ $jadwal->petugas->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.tugas') }}
                        </th>
                        <td>
                            {{ $jadwal->tugas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.bidang') }}
                        </th>
                        <td>
                            {{ $jadwal->bidang->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.seksi') }}
                        </th>
                        <td>
                            {{ $jadwal->seksi->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.lokasi') }}
                        </th>
                        <td>
                            {{ $jadwal->lokasi->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.tanggal_awal') }}
                        </th>
                        <td>
                            {{ $jadwal->tanggal_awal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.tanggal_akhir') }}
                        </th>
                        <td>
                            {{ $jadwal->tanggal_akhir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.waktu_mulai_kerja') }}
                        </th>
                        <td>
                            {{ $jadwal->waktu_mulai_kerja }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.waktu_selesai_kerja') }}
                        </th>
                        <td>
                            {{ $jadwal->waktu_selesai_kerja }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jadwal.fields.nomor_kontak') }}
                        </th>
                        <td>
                            {{ $jadwal->nomor_kontak }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection