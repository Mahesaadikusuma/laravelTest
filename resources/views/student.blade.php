@extends('layouts.Main')

@section('title', 'Student')

@section('content')
    <h1>Ini adalah halaman Students </h1>
    {{-- <h2>{{ $name }}</h2> --}}

    <h3>student list</h3>

    <div class="my-5 d-flex justify-content-between">

        <a href="{{ route('student-add') }}" class="btn btn-primary">Add Data</a>

        <a href="{{ route('deleted-student') }}" class="btn btn-info">Show Deleted Data</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if (Session::has('status'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif




    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3 ">
                <input type="text" class="form-control border-red-500" name="keyword" placeholder="keyword">

                <button class="input-group-text btn btn-primary ">Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Class</th>

                {{-- <th>Extracurricular</th>
                <th>Teacher</th> --}}
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($student as $item) --}}
            {{-- <tr> --}}
            {{-- + $student->firstItem() - 1 --}}
            {{-- <td>{{ $loop->iteration }}</td> --}}
            {{-- <td id='name'>{{ $item->name }}</td> --}}
            {{-- <td>{{ $item->gender }}</td> --}}
            {{-- <td>{{ $item->nis }}</td>
                    <td>{{ $item->class->name }}</td> --}}

            {{-- <td>
                        @foreach ($item->extracurriculars as $data)
                            {{ $data->name }} <br>
                        @endforeach
                    </td>
                    <td>{{ $item->class->teacher->name }}</td> --}}

            {{-- <td> --}}
            {{-- <a href="{{ route('detail', $item->slug) }}">Detail</a> --}}
            {{-- <a href="{{ route('student-edit', $item->slug) }}" id="edit">Edit</a> --}}
            {{-- <form action="{{ route('student.destroy', $item->id) }}" method="post"> --}}
            {{-- @method('delete') --}}
            {{-- @csrf --}}
            {{-- <button class="btn btn-warning " id="delete">Delete</button> --}}
            {{--  --}}
            {{-- </form>
            {{--  --}}
            {{-- </td> --}}
            {{-- </tr> --}}
            {{-- @endforeach --}}


            @forelse ($student as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td id='name'>{{ $item->name }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->class->name }}</td>


                    <td>
                        <a href="{{ route('detail', $item->slug) }}">Detail</a>
                        <a href="{{ route('student-edit', $item->slug) }}" id="edit">Edit</a>
                        <form action="{{ route('student.destroy', $item->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-warning " id="delete">Delete</button>

                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data Tidak Ada</td>
                </tr>
            @endforelse


        </tbody>
    </table>


    <div class="my-5">
        {{ $student->withQueryString()->links() }}
    </div>



@endsection


@push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        // INI DENGAN AJAX
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const href = form.attr('action');

                const name = form.closest('tr').find('#name').text();
                console.log(name);

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Anda akan menghapus data untuk Student ${name}.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    console.log(result);
                    if (result.isConfirmed) {
                        $.ajax({
                            url: href,
                            type: 'POST', // Change this to 'DELETE' if your server supports it
                            data: form.serialize(),
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(() => {
                                    // Redirect to the student page after successful deletion
                                    window.location.href =
                                        "{{ route('student') }}";
                                });
                                // You might want to add additional logic here, like refreshing the page or updating the UI
                            },
                            error: function(error) {
                                Swal.fire(
                                    'Error',
                                    'An error occurred while deleting the file.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
        // END
    </script>
@endpush
