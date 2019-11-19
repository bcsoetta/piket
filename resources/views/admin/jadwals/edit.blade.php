@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jadwal.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.jadwals.update", [$jadwal->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('petugas_id') ? 'has-error' : '' }}">
                <label for="petugas">{{ trans('cruds.jadwal.fields.petugas') }}*</label>
                <select name="petugas_id" id="petugas" class="form-control select2" required>
                    @foreach($petugas as $id => $petugas)
                        <option value="{{ $id }}" {{ (isset($jadwal) && $jadwal->petugas ? $jadwal->petugas->id : old('petugas_id')) == $id ? 'selected' : '' }}>{{ $petugas }}</option>
                    @endforeach
                </select>
                @if($errors->has('petugas_id'))
                    <p class="help-block">
                        {{ $errors->first('petugas_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tugas') ? 'has-error' : '' }}">
                <label for="tugas">{{ trans('cruds.jadwal.fields.tugas') }}*</label>
                <input type="text" id="tugas" name="tugas" class="form-control" value="{{ old('tugas', isset($jadwal) ? $jadwal->tugas : '') }}" required>
                @if($errors->has('tugas'))
                    <p class="help-block">
                        {{ $errors->first('tugas') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.jadwal.fields.tugas_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('bidang_id') ? 'has-error' : '' }}">
                <label for="bidang">{{ trans('cruds.jadwal.fields.bidang') }}*</label>
                <select name="bidang_id" id="bidang" class="form-control select2" required>
                    @foreach($bidangs as $id => $bidang)
                        <option value="{{ $id }}" {{ (isset($jadwal) && $jadwal->bidang ? $jadwal->bidang->id : old('bidang_id')) == $id ? 'selected' : '' }}>{{ $bidang }}</option>
                    @endforeach
                </select>
                @if($errors->has('bidang_id'))
                    <p class="help-block">
                        {{ $errors->first('bidang_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('seksi_id') ? 'has-error' : '' }}">
                <label for="seksi">{{ trans('cruds.jadwal.fields.seksi') }}*</label>
                <select name="seksi_id" id="seksi" class="form-control select2" required>
                    @foreach($seksis as $id => $seksi)
                        <option value="{{ $id }}" {{ (isset($jadwal) && $jadwal->seksi ? $jadwal->seksi->id : old('seksi_id')) == $id ? 'selected' : '' }}>{{ $seksi }}</option>
                    @endforeach
                </select>
                @if($errors->has('seksi_id'))
                    <p class="help-block">
                        {{ $errors->first('seksi_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('lokasi_id') ? 'has-error' : '' }}">
                <label for="lokasi">{{ trans('cruds.jadwal.fields.lokasi') }}*</label>
                <select name="lokasi_id" id="lokasi" class="form-control select2" required>
                    @foreach($lokasis as $id => $lokasi)
                        <option value="{{ $id }}" {{ (isset($jadwal) && $jadwal->lokasi ? $jadwal->lokasi->id : old('lokasi_id')) == $id ? 'selected' : '' }}>{{ $lokasi }}</option>
                    @endforeach
                </select>
                @if($errors->has('lokasi_id'))
                    <p class="help-block">
                        {{ $errors->first('lokasi_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tanggal_awal') ? 'has-error' : '' }}">
                <label for="tanggal_awal">{{ trans('cruds.jadwal.fields.tanggal_awal') }}*</label>
                <input type="text" id="tanggal_awal" name="tanggal_awal" class="form-control date" value="{{ old('tanggal_awal', isset($jadwal) ? $jadwal->tanggal_awal : '') }}" required>
                @if($errors->has('tanggal_awal'))
                    <p class="help-block">
                        {{ $errors->first('tanggal_awal') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.jadwal.fields.tanggal_awal_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tanggal_akhir') ? 'has-error' : '' }}">
                <label for="tanggal_akhir">{{ trans('cruds.jadwal.fields.tanggal_akhir') }}*</label>
                <input type="text" id="tanggal_akhir" name="tanggal_akhir" class="form-control date" value="{{ old('tanggal_akhir', isset($jadwal) ? $jadwal->tanggal_akhir : '') }}" required>
                @if($errors->has('tanggal_akhir'))
                    <p class="help-block">
                        {{ $errors->first('tanggal_akhir') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.jadwal.fields.tanggal_akhir_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('waktu_mulai_kerja') ? 'has-error' : '' }}">
                <label for="waktu_mulai_kerja">{{ trans('cruds.jadwal.fields.waktu_mulai_kerja') }}*</label>
                <input type="text" id="waktu_mulai_kerja" name="waktu_mulai_kerja" class="form-control timepicker" value="{{ old('waktu_mulai_kerja', isset($jadwal) ? $jadwal->waktu_mulai_kerja : '') }}" required>
                @if($errors->has('waktu_mulai_kerja'))
                    <p class="help-block">
                        {{ $errors->first('waktu_mulai_kerja') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.jadwal.fields.waktu_mulai_kerja_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('waktu_selesai_kerja') ? 'has-error' : '' }}">
                <label for="waktu_selesai_kerja">{{ trans('cruds.jadwal.fields.waktu_selesai_kerja') }}*</label>
                <input type="text" id="waktu_selesai_kerja" name="waktu_selesai_kerja" class="form-control timepicker" value="{{ old('waktu_selesai_kerja', isset($jadwal) ? $jadwal->waktu_selesai_kerja : '') }}" required>
                @if($errors->has('waktu_selesai_kerja'))
                    <p class="help-block">
                        {{ $errors->first('waktu_selesai_kerja') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.jadwal.fields.waktu_selesai_kerja_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nomor_kontak') ? 'has-error' : '' }}">
                <label for="nomor_kontak">{{ trans('cruds.jadwal.fields.nomor_kontak') }}*</label>
                <input type="text" id="nomor_kontak" name="nomor_kontak" class="form-control" value="{{ old('nomor_kontak', isset($jadwal) ? $jadwal->nomor_kontak : '') }}" required>
                @if($errors->has('nomor_kontak'))
                    <p class="help-block">
                        {{ $errors->first('nomor_kontak') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.jadwal.fields.nomor_kontak_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection