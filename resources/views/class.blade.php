@extends('Layouts.Main')

@section('title', 'Class')

@section('content')
    <h1>Ini adalah classRoom</h1>


    <div class="my-5">
        <a href="#" class="btn btn-primary ">Add Data</a>
    </div>

    <table class="table table-responsive">
        <thead>
            <tr>
                <th class="col-2">No.</th>
                <th class="col-2">Nama</th>
                <th class="col-2">Product</th>
                {{-- <th class="col-2">No.</th>
                <th class="col-2">Student</th>
                <th class="col-2">Teacher</th> --}}
                <th class="col-2">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classlist as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->product->name ?? 'tidak ada' }}</td>
                    {{-- <td>

                        @foreach ($data->student as $item)
                            {{ $item->name }} <br>
                        @endforeach
                    </td>
                    <td>
                        {{ $data->teacher->name }}
                    </td> --}}
                    <td>
                        <a href="{{ route('class-detail', $data->id) }}">Detail</a>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
