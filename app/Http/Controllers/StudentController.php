<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\classRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $student = Student::with(['class'])
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('nis', 'like', '%' . $keyword . '%')
            ->orWhere('gender',  $keyword)

            ->orWhereHas('class', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->paginate(20);
        

        
         

        // withTrashed()

        // dd($keyword);
        // $student = DB::table('students')
        //     ->join('class', 'class.id', '=', 'students.class_id')
        //     // ->orWhere('name', 'like', '%' . $keyword . '%')
        //     ->orWhere('nis', 'like', '%' . $keyword . '%')
        //     ->orWhere('gender',  $keyword)
        //     ->paginate(20);
        // simplePaginate
        // with(['class.teacher','extracurriculars'])->

        // dd($student);    
        
        return view('student', [
            'student' => $student,
            
        ]);
    }


    public function detail(Request $request, $slug)
    {
        $studentDetail = Student::with(['class.teacher', 'extracurriculars'])->where('slug', $slug)->firstOrFail();
        // dd($studentDetail);
        // findOrFail($id)

        // dd($studentDetail);

        return view('student-detail', [
            'studentDetail' => $studentDetail,
        ]);
    }

    public function create()
    {
        $class =  classRoom::select('id', 'name')->get();
        // $class = classRoom::all();
        return view('student-add', compact('class'));
    }


    public function store(StudentRequest $request)
    
    {
        

        // dd($request->all());
        // $student = new Student();
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();


        
        

        // Mass ASIGMENT
        
        $student = $request->all();
        $newName = "";
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name . '-' .now()->timestap. '.'.$extension;
            $request->file('image')->storeAs('photo', $newName);
        }
        $request['image'] = $newName;
        // return $request->file('image')->storeAs('photo', $newName)


        // $student['image'] = $request->file('image')->store('assets/student', 'public');
        Student::create($student);


        // if ($student)
        // {
        //     Session::flash('status', 'success');
        //     Session::flash('message', 'add new student success');
        // }
        Session::flash('success', 'Data berhasil dibuat.');
        return redirect()->route('student');
    }

    public function edit($slug)
    {
        $student = Student::with(['class'])->where('slug', $slug)->firstOrFail();
        // ->findOrFail($id);
        // $class = classRoom::all();
        $class = classRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', compact('student', 'class'));
    }



    public function update(StudentRequest $request, $slug)
    {


        // INI MASS ASIGNMENT
        $item = $request->all();

        $student = Student::with(['class'])->where('slug', $slug)->firstOrFail();
        // $student = Student::findOrFail($id);
        $student->update($item);



        // INI ADALAH CARA UPDATE versi panjang
        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;

        return redirect()->route('student')->with('success', 'Data Berhasil Di Update');
    }
    

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();


        return redirect()->route('student');
    }


    public function deletedStudent()
    {
        $student = Student::onlyTrashed()->get();
        return view('student-deleted-list', compact('student'));
    }

    public function restore($id)
    {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();

        return redirect()->route('student')->with('success', 'Restore Student Success');
    }
}
