@extends('layouts.admin')
@section('content')
@can('bu_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.bus.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bu.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bu.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Bu">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bu.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bu.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.bu.fields.places_available') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bus as $key => $bu)
                        <tr data-entry-id="{{ $bu->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bu->id ?? '' }}
                            </td>
                            <td>
                                {{ $bu->name ?? '' }}
                            </td>
                            <td>
                                {{ $bu->places_available ?? '' }}
                            </td>
                            <td>
                                @can('bu_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bus.show', $bu->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('bu_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bus.edit', $bu->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('bu_delete')
                                    <form action="{{ route('admin.bus.destroy', $bu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('bu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bus.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Bu:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection