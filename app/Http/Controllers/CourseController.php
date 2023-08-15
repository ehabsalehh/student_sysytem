<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();
        if ($request->filled("search"))
            $query->where('name', 'LIKE', "%$request->get('search')%")
                ->orWhere('code', 'LIKE', "%$request->get('search')%");

        return CourseResource::collection($query::get());
    }

}
