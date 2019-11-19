<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Http\Resources\Admin\JadwalResource;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function onDutyToday(){
        $jadwals = Jadwal::with(['petugas', 'bidang', 'seksi', 'lokasi'])->where('tanggal_awal', '<=', date('Y-m-d'))->where('tanggal_akhir', '>=', date('Y-m-d'))->get();
        return view('on-duty-today', compact('jadwals'));
    }
}
