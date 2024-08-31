<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
     public function index($id)
    {
         // Busca los cursos que coincidan con el interest_level_id dado
        $courses = Course::where('interest_level_id', $id)->get();

        // Retorna los resultados en formato JSON
        return response()->json($courses);
    }
}
