<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\CreateStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $query = Student::query();
        if ($request->filled("level"))
            $query->where('level_id', $request->get("level"));

        if ($request->filled("search"))
            $query->where('full_name', 'LIKE', "%$request->get('search')%")
                ->orWhere('code', 'LIKE', "%$request->get('search')%")
                ->orWhere('email', 'LIKE', "%$request->get('search')%");

        return StudentResource::collection($query::with('level', 'courses.gradeItems')->get());

    }

    public function store(CreateStudentRequest $request)
    {
        $data = $request->validated();
        $student = Student::create($data);
        return StudentResource::make($student);
    }

    public function show($student)
    {
        $student = Student::findOrFail($student);
        return StudentResource::make($student);
    }

    public function update(UpdateStudentRequest $request, $student)
    {
        $student = Student::findOrFail();
        $data = $request->validated();
        $student->update($data);
        return StudentResource::make($student);
    }

    public function destroy($student)
    {
        $student = Student::findOrFail();
        $student->delete();
        return StudentResource::make($student);
    }
}
