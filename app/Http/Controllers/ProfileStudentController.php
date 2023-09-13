<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStudentRequest;
use App\Models\ProfileStudent;
use Illuminate\Http\Request;

class ProfileStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = ProfileStudent::all();

        return view('Profile.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileStudentRequest $request)
    {
        $items =  $request->all();

        ProfileStudent::create($items);

        return redirect()->route('profile.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = ProfileStudent::findOrFail($id);


        return view('Profile.Edit', compact('item'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileStudentRequest $request, string $id)
    {
        $data =  $request->all();
        $item = ProfileStudent::findOrFail($id);
        $item->update($data);

        return redirect()->route('profile.index')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ProfileStudent::findOrFail($id);
        $item->delete();

        return redirect()->route('profile.index')->with('success', 'Data Telah Di hapus');
    }
}
