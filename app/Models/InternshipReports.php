<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipReports extends Model
{
    use HasFactory;

    public function InternshipSubmission() {
        return $this->belongsTo(InternshipSubmission::class);
    }
}
