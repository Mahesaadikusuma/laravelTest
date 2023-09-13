<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $eskul =  Extracurricular::with(['student'])->get();

        // dd($eskul);

        return view('extracurricular', [
            'eskul' => $eskul
        ]);
    }

    public function show(Request $request, $id)
    {
        $eskul = Extracurricular::findOrFail($id);


        return view('eskul-detail', [
            'eskul' => $eskul,
        ]);
    }
}
