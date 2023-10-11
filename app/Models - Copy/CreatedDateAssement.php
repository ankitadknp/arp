<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CreatedDateAssement extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sent_mail';
    protected $fillable = [
        'representative_id',
        'name',
        'email',
        'credit_score',
        'visa_type',
        'file',
        'is_sent_mail'
    ];

}
