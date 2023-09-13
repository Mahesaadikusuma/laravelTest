@extends('layouts.Main')

@section('title', 'extracurricular Detail')

@section('content')
    <h1>Ini adalah halaman Class Detail </h1>
    <h3>Anda sedang melihat extracurricular {{ $eskul->name }}</h3>




    <div class='mt-5 mb-5'>
        <h3>List Peserta</h3>
        <ol>
            @foreach ($eskul->student as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

    {{ $eskul }}

    {{-- <div class="mt-5">
        <h4>List Students</h4>

        <ol>
            @foreach ($detail->student as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div> --}}


    {{ $eskul }}

    <style>
        th {
            width: 25%;
        }
    </style>
@endsection
