<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InternshipReport;

class InternshipSubmission extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    
    public function advisors() {
        
        return $this->belongsTo(Advisor::class, 'advisor_id', 'id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function industries() {
        return $this->belongsTo(Industry::class, 'industry_id','id');
    }

    public function internshipLogbooks() {
        return $this->hasMany(InternshipLogbooks::class);
    }

    public function InternshipMonthlyReport() {
        return $this->hasMany(InternshipMonthlyReport::class);
    }

    public function InternshipReport() {
        return $this->hasOne(InternshipReport::class);
    }

  

}

