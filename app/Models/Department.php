<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];


   public function Employee(){
        return $this->hasMany('App\Models\Employee');
    }
}
