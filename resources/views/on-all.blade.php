@extends('layouts.front')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jadwal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Jadwal">
            <thead class="thead-dark">
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

    let dtOverrideGlobals = {
        processing: true,
        serverSide: true,
        retrieve: true,
        aaSorting: [],
        ajax: "{{ route('jadwal.all') }}",
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