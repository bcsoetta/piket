<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Http\Resources\Admin\JadwalResource;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function onToday(){
        $jadwals = Jadwal::with(['petugas', 'bidang', 'seksi', 'lokasi'])->where('tanggal_awal', '<=', date('Y-m-d'))->where('tanggal_akhir', '>=', date('Y-m-d'))->get();
        return view('on-today', compact('jadwals'));
    }

    public function onAll(Request $request){

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

        return view('on-all');
    }



}
