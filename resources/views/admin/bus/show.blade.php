@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bu.fields.id') }}
                        </th>
                        <td>
                            {{ $bu->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bu.fields.name') }}
                        </th>
                        <td>
                            {{ $bu->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bu.fields.places_available') }}
                        </th>
                        <td>
                            {{ $bu->places_available }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection