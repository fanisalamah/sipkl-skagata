<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipLogbooks extends Model
{
    use HasFactory;
    
    public function internshipSubmission() {
        return $this->belongsTo(InternshipSubmission::class);
    }
}
