<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Petuga extends Model
{
    use SoftDeletes;

    public $table = 'petugas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nip',
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'petugas_id', 'id');
    }
}
