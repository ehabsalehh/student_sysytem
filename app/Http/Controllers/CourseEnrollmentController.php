<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Student;

class CourseEnrollmentController extends Controller
{

    public function enroll(Course $course, Student $student)
    {
        $course->students()->attach($student);
        return CourseResource::make($course);
    }

    public function unenroll(Course $course, Student $student)
    {
        $course->students()->detach($student);
        return CourseResource::make($course);
    }

    public function getEnrolledStudents($course)
    {
        $course = Course::findOrFail($course);
        $course->load("students");
        return CourseResource::make($course);
    }

}
