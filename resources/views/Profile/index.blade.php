@extends('Layouts.Profile')

@section('name', 'Profile')

@section('content')
    <div class="my-5">
        <h1>All Profile </h1>
    </div>

    <div class="mb-3">
        <a href="{{ route('profile.create') }}" class="btn btn-primary">+ Profile</a>
    </div>


    <!-- /resources/views/post/create.blade.php -->





    <!-- Create Post Form -->
    <div class="table-responsive mx-auto">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">NIK</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($item as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->nik }}</td>

                        <td class="">
                            <a href="{{ route('profile.edit', $item->id) }}" class="btn btn-success inline">Edit</a>


                            <form action="{{ route('profile.destroy', $item->id) }}" method="post">
                                @method('delete')
                                @csrf

                                <button class="btn btn-danger inline-block">Delete</button>


                            </form>
                        </td>
                    </tr>
                @empty

                    <tr>
                        <td colspan="7" class="text-center">No data</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

@endsection
