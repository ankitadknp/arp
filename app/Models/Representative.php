<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Representative extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'representative';
    protected $fillable = [
        'name',
        'signature_photo',
        'bio',
        'photo',
        'brand_id',
        'linkedin_id',
        'email',
        'cba_number',
        'license_number',
        'password'
    ];

}
