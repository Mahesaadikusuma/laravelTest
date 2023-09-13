<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {   
        $teacher = Teacher::all();
        return view('Teacher', compact('teacher'));
    }

    public function show(Request $request, $id)
    {
        $teacher = Teacher::with('class.student')->findOrFail($id);
        return view('Teacher-Detail', compact('teacher'));
    }
}
