@extends('layouts.Main')

@section('title', 'Class Detail')

@section('content')
    <h1>Ini adalah halaman Class Detail </h1>
    <h3>Anda sedang melihat Class {{ $detail->name }}</h3>




    <div class='mt-5 mb-5'>
        <h4>HomeRoom Teacher : {{ $detail->teacher->name }} </h4>
    </div>


    <div class="mt-5">
        <h4>List Students</h4>

        <ol>
            @foreach ($detail->student as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>


    {{ $detail }}

    <style>
        th {
            width: 25%;
        }
    </style>
@endsection
