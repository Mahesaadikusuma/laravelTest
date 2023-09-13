@extends('layouts.Main')

@section('title', 'Student')

@section('content')
    <div class="my-5">
        <h1>Create Student </h1>
    </div>


    <div class="my-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>



    {{-- {{ route('profile.store') }} --}}
    <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="bagas saputra"
                name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Gender</label>
            <select name="gender" class="form-select" aria-label="Default select example">
                <option selected>Select Gender</option>
                <option value="L" {{ old('gender') === 'L' ? 'selected' : '' }}>L</option>
                <option value="P" {{ old('gender') === 'P' ? 'selected' : '' }}>P</option>ac
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIS</label>
            <input name="nis" type="number" class="form-control " id="exampleFormControlInput1"
                placeholder="bagas saputra" value="{{ old('nis') }}">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Class</label>
            <select name="class_id" class="form-select" aria-label="Default select example">
                <option selected>Select Class</option>
                @foreach ($class as $item)
                    <option value="{{ $item->id }}" {{ old('class_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Image</label>
            <div class="input-group ">
                <input type="file" class="form-control" id="photo" name='image'>
            </div>
        </div>



        <div class="d-grid gap-2">
            <button class="btn btn-primary" id="post" type="submit">Create</button>
        </div>

    </form>
@endsection

@push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- yang ini tidak muncul validasinya --}}
    {{-- <script>
        $(function() {
            $('#post').on('click', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const href = form.attr('action');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Create Student'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: href,
                            type: 'POST',
                            data: form.serialize(),
                            success: function(response) {
                                Swal.fire(
                                    'Behasil Create Student!',
                                    'Your file has been Post.',
                                    'success'
                                ).then(() => {
                                    window.location.href =
                                        "{{ route('student') }}";
                                });
                            },
                            error: function(error) {
                                Swal.fire(
                                    'Error',
                                    'An error occurred while creating the student.',
                                    'error',


                                );
                            }
                        });
                    }
                });
            });
        });
    </script> --}}


    {{-- ini muncul validasinya --}}
    {{-- <script>
        $(function() {
            $('#post').on('click', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const href = form.attr('action');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Create Student'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: href,
                            type: 'POST',
                            data: form.serialize(),
                            success: function(response) {
                                Swal.fire(
                                    'Behasil Create Student!',
                                    'Your file has been Post.',
                                    'success'
                                ).then(() => {
                                    window.location.href =
                                        "{{ route('student') }}";
                                });
                            },
                            error: function(error) {
                                if (error.status === 422) {

                                    // Ini menggunakan forech
                                    const errorMessages = error.responseJSON.errors;
                                    // let errorMessage = '<ul>';
                                    // $.each(errorMessages, function(key, value) {
                                    //     errorMessage += '<li>' + value[0] +
                                    //         '</li>';
                                    // });
                                    // errorMessage += '</ul>';

                                    // end


                                    // Menggunakan Map
                                    let errorMessageNewArray = Object.values(
                                        errorMessages).map(message => message[0]);

                                    let errorMessage = errorMessageNewArray.join(
                                        '<br>'
                                    );

                                    $('.alert-danger').html(errorMessage).show();

                                    Swal.fire(
                                        'Validation Error',
                                        // errorMessage,
                                        errorMessage,
                                        'error'
                                    );
                                } else {
                                    Swal.fire(
                                        'Error',
                                        'An error occurred while creating the student.',
                                        'error'
                                    );
                                }
                            }
                        });
                    }
                });
            });
        });
    </script> --}}


    {{-- <script>
        $(function() {
            $('#post').on('click', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');
                const href = form.attr('action');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Create Student'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const response = await $.ajax({
                                url: href,
                                type: 'POST',
                                data: form.serialize()
                            });
                            window.location.href = "{{ route('student') }}";

                            Swal.fire(
                                'Behasil Create Student!',
                                'Your file has been Post.',
                                'success'

                            ).then(() => {
                                // window.location.href = "{{ route('student') }}";
                            });
                        } catch (error) {
                            if (error.status === 422) {
                                const errorMessages = Object.values(error.responseJSON.errors)
                                    .map(messages => messages[0])
                                    .join('<br>');

                                $('.alert-danger').html(errorMessages).show();
                                Swal.fire(
                                    'Error',
                                    errorMessages,
                                    'error'
                                );
                            } else {
                                Swal.fire(
                                    'Error',
                                    'An error occurred while creating the student.',
                                    'error'
                                );
                            }
                        }
                    }
                });
            });
        });
    </script> --}}
@endpush
