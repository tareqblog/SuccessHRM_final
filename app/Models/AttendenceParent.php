<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendenceParent extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function candidate()
    {
        return $this->belongsTo(candidate::class);
    }
}
