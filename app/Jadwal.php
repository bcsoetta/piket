<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;

    public $table = 'jadwals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'tanggal_awal',
        'tanggal_akhir',
    ];

    public static $searchable = [
        'tugas',
        'tanggal_awal',
        'tanggal_akhir',
        'waktu_mulai_kerja',
        'waktu_selesai_kerja',
    ];

    protected $fillable = [
        'tugas',
        'seksi_id',
        'bidang_id',
        'lokasi_id',
        'petugas_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'tanggal_awal',
        'nomor_kontak',
        'tanggal_akhir',
        'waktu_mulai_kerja',
        'waktu_selesai_kerja',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petuga::class, 'petugas_id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function seksi()
    {
        return $this->belongsTo(Seksi::class, 'seksi_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    public function getTanggalAwalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAwalAttribute($value)
    {
        $this->attributes['tanggal_awal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTanggalAkhirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAkhirAttribute($value)
    {
        $this->attributes['tanggal_akhir'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
