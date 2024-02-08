<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateRemarkShortlist extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function candidate_remark(): BelongsTo
    {
        return $this->belongsTo(User::class, 'candidate_remark_id');
    }
}
