<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    
    protected $fillable = [
        'name',
        'address',
    ];
    
    public function internshipsubmissions() {
        return $this->hasMany(InternshipSubmission::class, 'industry_id', 'id');
    }

}
