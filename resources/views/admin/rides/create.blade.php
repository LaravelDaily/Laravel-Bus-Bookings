@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ride.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rides.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="bus_id">{{ trans('cruds.ride.fields.bus') }}</label>
                <select class="form-control select2 {{ $errors->has('bus') ? 'is-invalid' : '' }}" name="bus_id" id="bus_id" required>
                    @foreach($buses as $id => $bus)
                        <option value="{{ $id }}" {{ old('bus_id') == $id ? 'selected' : '' }}>{{ $bus }}</option>
                    @endforeach
                </select>
                @if($errors->has('bus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bus') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ride.fields.bus_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="departure_place">{{ trans('cruds.ride.fields.departure_place') }}</label>
                <input class="form-control {{ $errors->has('departure_place') ? 'is-invalid' : '' }}" type="text" name="departure_place" id="departure_place" value="{{ old('departure_place', '') }}" required>
                @if($errors->has('departure_place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('departure_place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ride.fields.departure_place_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="arrival_place">{{ trans('cruds.ride.fields.arrival_place') }}</label>
                <input class="form-control {{ $errors->has('arrival_place') ? 'is-invalid' : '' }}" type="text" name="arrival_place" id="arrival_place" value="{{ old('arrival_place', '') }}" required>
                @if($errors->has('arrival_place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('arrival_place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ride.fields.arrival_place_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="departure_time">{{ trans('cruds.ride.fields.departure_time') }}</label>
                <input class="form-control datetime {{ $errors->has('departure_time') ? 'is-invalid' : '' }}" type="text" name="departure_time" id="departure_time" value="{{ old('departure_time') }}" required>
                @if($errors->has('departure_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('departure_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ride.fields.departure_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="arrival_time">{{ trans('cruds.ride.fields.arrival_time') }}</label>
                <input class="form-control datetime {{ $errors->has('arrival_time') ? 'is-invalid' : '' }}" type="text" name="arrival_time" id="arrival_time" value="{{ old('arrival_time') }}" required>
                @if($errors->has('arrival_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('arrival_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ride.fields.arrival_time_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_booking_open') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_booking_open" id="is_booking_open" value="1" {{ old('is_booking_open', 0) == 1 || old('is_booking_open') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_booking_open">{{ trans('cruds.ride.fields.is_booking_open') }}</label>
                </div>
                @if($errors->has('is_booking_open'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_booking_open') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.ride.fields.is_booking_open_helper') }}</span>
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
