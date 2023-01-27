<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
  
    protected $fillable = [
        'fullName', 'contactNum', 'address', 'dateOfBirth'
    ];

    protected $dates = [
        'created_at',
        'created_at',
        'dateofBirth',
    ];
    
    public function sessions()
    {
        return $this->hasMany(Session::class)->where('patient_id');
    }    
}
