<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        static::created(function ($candidate) {
            $candidate->created_by = Auth::user()->id;
            $candidate->save();
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($candidate) {
            $candidate->modify_by = Auth::user()->id;
            // $candidate->save();
        });
    }
}
