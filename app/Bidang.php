<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidang extends Model
{
    use SoftDeletes;

    public $table = 'bidangs';

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
        return $this->hasMany(Jadwal::class, 'bidang_id', 'id');
    }
}
