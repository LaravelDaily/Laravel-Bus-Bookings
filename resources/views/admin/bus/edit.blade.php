@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bu.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bus.update", [$bu->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.bu.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $bu->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bu.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="places_available">{{ trans('cruds.bu.fields.places_available') }}</label>
                <input class="form-control {{ $errors->has('places_available') ? 'is-invalid' : '' }}" type="number" name="places_available" id="places_available" value="{{ old('places_available', $bu->places_available) }}" step="1" required>
                @if($errors->has('places_available'))
                    <div class="invalid-feedback">
                        {{ $errors->first('places_available') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bu.fields.places_available_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection