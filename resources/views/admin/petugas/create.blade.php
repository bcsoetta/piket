@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.petuga.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.petugas.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">{{ trans('cruds.petuga.fields.nama') }}*</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($petuga) ? $petuga->nama : '') }}" required>
                @if($errors->has('nama'))
                    <p class="help-block">
                        {{ $errors->first('nama') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.petuga.fields.nama_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nip') ? 'has-error' : '' }}">
                <label for="nip">{{ trans('cruds.petuga.fields.nip') }}*</label>
                <input type="text" id="nip" name="nip" class="form-control" value="{{ old('nip', isset($petuga) ? $petuga->nip : '') }}" required>
                @if($errors->has('nip'))
                    <p class="help-block">
                        {{ $errors->first('nip') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.petuga.fields.nip_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection