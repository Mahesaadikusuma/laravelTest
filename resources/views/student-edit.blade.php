@extends('layouts.Main')

@section('title', 'Student')

@section('content')
    <div class="my-5">
        <h1>Edit Student </h1>
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
    <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control " id="exampleFormControlInput1" placeholder="bagas saputra"
                name="name" value="{{ $student->name }}">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Gender</label>
            <select name="gender" class="form-select" aria-label="Default select example">
                <option selected value="{{ $student->gender }}">{{ $student->gender }}</option>

                @if ($student->gender == 'L')
                    <option value="P">P </option>
                @else
                    <option value="L">L</option>
                @endif

            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIS</label>
            <input name="nis" type="number" class="form-control " id="exampleFormControlInput1"
                placeholder="bagas saputra" name="nis" value="{{ $student->nis }}">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Class</label>
            <select name="class_id" class="form-select" aria-label="Default select example">
                <option selected value="{{ $student->class->id }}">{{ $student->class->name }}</option>
                @foreach ($class as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- {{ old('nik') }} --}}



        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>

    </form>

    {{ $student }}
    <br>
    {{ $class }}
@endsection
