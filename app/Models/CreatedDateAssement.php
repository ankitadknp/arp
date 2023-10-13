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
        'language_id',
        'name',
        'email',
        'credit_score',
        'visa_type_id',
        'recommended_visa_type',
        'pdf_file',
        'is_sent_mail',
        'country',
        'education_level',
        'occupation',
        'age',
        'case_number',
        'phone_no',
        'city'
    ];

}
