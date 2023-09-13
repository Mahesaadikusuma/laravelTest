<?php

namespace App\Http\Controllers;

use App\Models\classRoom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        // $name = "Mahesa";

        // eager load
        $class = classRoom::with(['product'])->get(); // cara request data => ketika dibuthuhkan ambil data
        // with(['student', 'teacher'])->get()
        // select * from table class
        // select * from studen where class in(1A, 1B, 1C)

        // lazy load
        // $class =  classRoom::all(); // cara request data
        // select * from table class
        // select * from student where class class = 1A
        // select * from student where class class = 1B
        // select * from student where class class = 1C

        
        // dd($class);
        // dd($student);
        // dd('hello');
        return view('class', [
            'classlist' => $class,
        ]);
    }


    public function detail(Request $request, $id)
    {
        $detail = classRoom::with(['student','teacher'])->findorFail($id);

        return view('Class-detail',compact('detail'));
    }
}
