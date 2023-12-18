<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUploadFile extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];




    public function file_type()
    {
        return $this->belongsTo(uploadfiletype::class, 'file_type_id');
    }
}
