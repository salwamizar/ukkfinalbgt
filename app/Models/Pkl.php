<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pkl extends Model
{
    use HasFactory;
    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'siswa_id',
        'industri_id',
        'guru_id',
        'mulai',
        'selesai'
    ];
    protected $casts = [
        'mulai' => 'date',
        'selesai' => 'date',
    ];

    public function guru() {
        return $this->belongsTo(Guru::class);
    }

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

    public function industri() {
        return $this->belongsTo(Industri::class);
    }

    protected $table = 'pkls';

    public function getDurasiAttribute() {
        return $this->mulai->diffInDays($this->selesai);
    }
}
