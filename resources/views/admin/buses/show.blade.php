@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bus.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.buses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bus.fields.id') }}
                        </th>
                        <td>
                            {{ $bus->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bus.fields.name') }}
                        </th>
                        <td>
                            {{ $bus->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bus.fields.places_available') }}
                        </th>
                        <td>
                            {{ $bus->places_available }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.buses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
