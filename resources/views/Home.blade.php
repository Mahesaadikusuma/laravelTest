@extends('Layouts.Main')

@section('title', 'Home Page')


@section('content')

    <h1>Hello, world!</h1>
    <h4>Selamat Datang {{ $name }}, anda adalah {{ $role }}</h4>

    @if ($role == 'Admin')
        <a href="#">Halaman Admin</a>
    @elseif ($role == 'Frontend Developer')
        <a href="#">Halaman Role {{ $role }}</a>
    @endif




    {{-- <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>


        @foreach ($buah as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data }}</td>
            </tr>
        @endforeach
    </table> --}}

@endsection
