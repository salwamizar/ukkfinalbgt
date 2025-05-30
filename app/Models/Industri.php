<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industri extends Model
{
    use HasFactory;
    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'foto',
        'nama',
        'bidang_usaha',
        'alamat',
        'kontak',
        'email',
        'guru_pembimbing'
    ];

    public function pkls() {
        return $this->hasMany(Pkl::class);
    }
}
