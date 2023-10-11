<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class VisaTypeDetails extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'visa_type_details';
    protected $fillable = [
        'visa_type_id',
        'brand_id',
        'language_id',
        'visa_key',
        'value',
        'is_image'
    ];

    public function visa()
    {
        return $this->belongsTo(Visa::class, 'visa_type_id', 'id');
    }

}
