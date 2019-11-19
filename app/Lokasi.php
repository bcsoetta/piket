<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lokasi extends Model
{
    use SoftDeletes;

    public $table = 'lokasis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'lokasi_id', 'id');
    }
}
