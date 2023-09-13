@extends('layouts.Main')

@section('title', 'Student Detail')

@section('content')
    <h1>Ini adalah halaman Student Detail </h1>
    <h3>Anda sedang melihat Detail {{ $studentDetail->name }}</h3>


    {{-- <p>siswa {{ $studentDetail->name }}, kelas {{ $studentDetail->class->name }}, dengan wali kelas
        {{ $studentDetail->class->teacher->name }} --}}


    </p>

    <div class='mt-5 mb-5'>
        <table class="table table-bordered">
            <tr>
                <th>NIS</th>
                <th>Gender</th>
                <th>Class</th>
                <th>HomeRoom Teacher</th>
            </tr>

            <tr>
                <td>{{ $studentDetail->nis }}</td>
                <td>{{ $studentDetail->gender == 'L' ? 'Pria' : 'Wanita' }}</td>
                <td>{{ $studentDetail->class->name }}</td>
                <td>{{ $studentDetail->class->teacher->name }}</td>
            </tr>


        </table>
    </div>

    <div class="">
        <ol>


            @foreach ($studentDetail->extracurriculars as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

    {{ $studentDetail }}

    <style>
        th {
            width: 25%;
        }
    </style>
@endsection
