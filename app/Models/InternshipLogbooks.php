<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipLogbooks extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    
    public function internshipSubmission() {
        return $this->belongsTo(InternshipSubmission::class, 'internship_submission_id', 'id');
    }

    public static function getUploadPath() {
        return '/internship/logbook';
    }


}
