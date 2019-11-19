@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bidang.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.bidangs.update", [$bidang->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">{{ trans('cruds.bidang.fields.nama') }}*</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($bidang) ? $bidang->nama : '') }}" required>
                @if($errors->has('nama'))
                    <p class="help-block">
                        {{ $errors->first('nama') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.bidang.fields.nama_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection