<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name', 'code', 'date_of_birth', 'email', 'level',
    ];
    public function levels()
    {
        return $this->belongsTo(Level::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

}
