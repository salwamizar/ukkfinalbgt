<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
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
        'nis',
        'gender',
        'alamat',
        'kontak',
        'email',
        'status_pkl'
    ];

    public function pkls(){
        return $this->hasMany(Pkl::class);
    }

    protected static function booted()
    {
        static::created(function ($siswa) {
            $user = \App\Models\User::where('email', $siswa->email)->first();

            if ($user && !$user->hasVerifiedEmail()) {
                $user->forceFill([
                    'email_verified_at' => now(),
                ])->save();
            }
        });
    }
}
