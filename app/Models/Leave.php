<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Leave extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::created(function ($Leave) {
            $Leave->created_by = Auth::user()->id;
            $Leave->save();
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($Leave) {
            $Leave->modify_by = Auth::user()->id;
            // $Leave->save();
        });
    }
}
