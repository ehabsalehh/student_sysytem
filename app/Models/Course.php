<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function gradeItems()
    {
        return $this->belongsToMany(GradeItem::class)->withTimestamps();
    }
}
