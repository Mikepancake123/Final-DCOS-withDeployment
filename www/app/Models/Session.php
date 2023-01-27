<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'dentalProcedure',
        'complain',
       // 'presentDate',
        'toothNum',
        'payment',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }  

    protected $dates = [
        'created_at',
        // 'presentDate',
    ];

}
