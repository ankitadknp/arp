<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SmtpSetting extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'smtp_setting';
    protected $fillable = [
        'host',
        'brand_id',
        'port',
        'username',
        'password',
        'encryption',
        'from_email_address',
        'from_name'
    ];

}
