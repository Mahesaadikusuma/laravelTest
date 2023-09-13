@extends('layouts.Main')

@section('title', 'Teacher-Detail ')

@section('content')
    <h1>Ini adalah halaman Teacher-Detail </h1>
    <h3>Anda sedang melihat Teacher {{ $teacher->name }}</h3>




    <div class='mt-5 mb-5'>
        <h3>List Kelas : </h3>
        <ol>
            <li>{{ $teacher->class->name ?? 'Tidak ada' }}</li>
            {{-- @foreach ($teacher->class as $item)
                <li>{{ $item->name }}</li>
            @endforeach --}}
        </ol>
    </div>



    <div class="mt-5">
        <h4>List Student : </h4>
        <ol>
            @foreach ($teacher->class->student as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>

    </div>



    {{ $teacher }}
    <style>
        th {
            width: 25%;
        }
    </style>
@endsection
