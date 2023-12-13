<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        static::created(function ($client) {
            $client->created_by = Auth::user()->id;
            $client->save();
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($client) {
            $client->modify_by = Auth::user()->id;
            $client->save();
        });
    }
}
