@extends('Layouts.Main')

@section('title', 'Extracurricular')

@section('content')
    <h1>Ini adalah Teacher</h1>

    <div class="my-5">
        <a href="#" class="btn btn-primary ">Add Data</a>
    </div>

    <table class="table table-responsive">
        <thead>
            <tr>

                <th class="col-2">No.</th>
                <th class="col-2">Name</th>
                <th class="col-2">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($teacher as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="{{ route('teacher-detail', $data->id) }}">Detail</a>
                    </td>
                    {{-- <td>
                        @foreach ($data->student as $item)
                            {{ $item->name }} <br>
                        @endforeach
                    </td> --}}
                </tr>
            @endforeach



        </tbody>



    </table>
@endsection
