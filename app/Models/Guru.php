<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
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
        'nip',
        'gender',
        'alamat',
        'kontak',
        'email'
    ];

    public function pkls() {
        return $this->hasMany(Pkl::class);
    }

    protected static function booted()
    {
        static::created(function ($guru) {
            $user = \App\Models\User::where('email', $guru->email)->first();

            if ($user && !$user->hasVerifiedEmail()) {
                $user->forceFill([
                    'email_verified_at' => now(),
                ])->save();
            }
        });
    }
}
