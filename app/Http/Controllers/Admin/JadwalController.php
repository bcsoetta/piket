<?php

namespace App\Http\Controllers\Admin;

use App\Bidang;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJadwalRequest;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Jadwal;
use App\Lokasi;
use App\Petuga;
use App\Seksi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Jadwal::with(['petugas', 'bidang', 'seksi', 'lokasi'])->select(sprintf('%s.*', (new Jadwal)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'jadwal_show';
                $editGate      = 'jadwal_edit';
                $deleteGate    = 'jadwal_delete';
                $crudRoutePart = 'jadwals';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('petugas_nama', function ($row) {
                return $row->petugas ? $row->petugas->nama : '';
            });

            $table->editColumn('petugas.nip', function ($row) {
                return $row->petugas ? (is_string($row->petugas) ? $row->petugas : $row->petugas->nip) : '';
            });
            $table->editColumn('tugas', function ($row) {
                return $row->tugas ? $row->tugas : "";
            });
            $table->addColumn('bidang_nama', function ($row) {
                return $row->bidang ? $row->bidang->nama : '';
            });

            $table->addColumn('seksi_nama', function ($row) {
                return $row->seksi ? $row->seksi->nama : '';
            });

            $table->addColumn('lokasi_nama', function ($row) {
                return $row->lokasi ? $row->lokasi->nama : '';
            });

            $table->editColumn('waktu_mulai_kerja', function ($row) {
                return $row->waktu_mulai_kerja ? $row->waktu_mulai_kerja : "";
            });
            $table->editColumn('waktu_selesai_kerja', function ($row) {
                return $row->waktu_selesai_kerja ? $row->waktu_selesai_kerja : "";
            });
            $table->editColumn('nomor_kontak', function ($row) {
                return $row->nomor_kontak ? $row->nomor_kontak : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'petugas', 'bidang', 'seksi', 'lokasi']);

            return $table->make(true);
        }

        return view('admin.jadwals.index');
    }

    public function create()
    {
        abort_if(Gate::denies('jadwal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petugas = Petuga::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bidangs = Bidang::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seksis = Seksi::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lokasis = Lokasi::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jadwals.create', compact('petugas', 'bidangs', 'seksis', 'lokasis'));
    }

    public function store(StoreJadwalRequest $request)
    {
        $jadwal = Jadwal::create($request->all());

        return redirect()->route('admin.jadwals.index');
    }

    public function edit(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petugas = Petuga::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bidangs = Bidang::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seksis = Seksi::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lokasis = Lokasi::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jadwal->load('petugas', 'bidang', 'seksi', 'lokasi');

        return view('admin.jadwals.edit', compact('petugas', 'bidangs', 'seksis', 'lokasis', 'jadwal'));
    }

    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwals.index');
    }

    public function show(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwal->load('petugas', 'bidang', 'seksi', 'lokasi');

        return view('admin.jadwals.show', compact('jadwal'));
    }

    public function destroy(Jadwal $jadwal)
    {
        abort_if(Gate::denies('jadwal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwal->delete();

        return back();
    }

    public function massDestroy(MassDestroyJadwalRequest $request)
    {
        Jadwal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
