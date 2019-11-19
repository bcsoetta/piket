@extends('layouts.admin')
@section('content')
@can('jadwal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.jadwals.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.jadwal.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jadwal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Jadwal">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.petugas') }}
                    </th>
                    <th>
                        {{ trans('cruds.petuga.fields.nip') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.tugas') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.bidang') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.seksi') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.lokasi') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.tanggal_awal') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.tanggal_akhir') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.waktu_mulai_kerja') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.waktu_selesai_kerja') }}
                    </th>
                    <th>
                        {{ trans('cruds.jadwal.fields.nomor_kontak') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('jadwal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jadwals.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.jadwals.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'petugas_nama', name: 'petugas.nama' },
{ data: 'petugas.nip', name: 'petugas.nip' },
{ data: 'tugas', name: 'tugas' },
{ data: 'bidang_nama', name: 'bidang.nama' },
{ data: 'seksi_nama', name: 'seksi.nama' },
{ data: 'lokasi_nama', name: 'lokasi.nama' },
{ data: 'tanggal_awal', name: 'tanggal_awal' },
{ data: 'tanggal_akhir', name: 'tanggal_akhir' },
{ data: 'waktu_mulai_kerja', name: 'waktu_mulai_kerja' },
{ data: 'waktu_selesai_kerja', name: 'waktu_selesai_kerja' },
{ data: 'nomor_kontak', name: 'nomor_kontak' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  $('.datatable-Jadwal').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection