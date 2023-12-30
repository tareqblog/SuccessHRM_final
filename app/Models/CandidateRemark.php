<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CandidateRemark extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];

    public static function boot()
    {
        parent::boot();
        static::created(function ($candidate_remark) {
            $candidate_remark->created_by = Auth::user()->id;
            $candidate_remark->save();
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($candidate_remark) {
            $candidate_remark->modify_by = Auth::user()->id;
            // $client->save();
        });
    }

    public function Assign()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function remarksType()
    {
        return $this->belongsTo(remarkstype::class, 'remarkstype_id', 'id');
    }
}
