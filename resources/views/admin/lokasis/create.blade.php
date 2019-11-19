@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.lokasi.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.lokasis.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">{{ trans('cruds.lokasi.fields.nama') }}*</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($lokasi) ? $lokasi->nama : '') }}" required>
                @if($errors->has('nama'))
                    <p class="help-block">
                        {{ $errors->first('nama') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lokasi.fields.nama_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection