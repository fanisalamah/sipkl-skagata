<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipSubmission extends Model
{
    use HasFactory;
    
    public function advisors() {
        // return $this->belongsToMany(InternshipSubmission::class, 'advisor_internshipsubmission', 'internshipsubmission_id', 'advisor_id');
        return $this->belongsTo(Advisor::class, 'advisor_id', 'id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function industries() {
        return $this->belongsTo(Industry::class, 'id');
    }

    public function internshipLogbooks() {
        return $this->hasMany(InternshipLogbooks::class);
    }


}

