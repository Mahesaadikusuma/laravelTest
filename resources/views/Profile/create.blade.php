@extends('Layouts.Profile')

@section('name', 'Create Profile')

@section('content')
    <div class="my-5">
        <h1>Create Profile </h1>
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
    <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" id="exampleFormControlInput1"
                value="{{ old('nik') }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                value="{{ old('tempat_lahir') }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                value="{{ old('tanggal_lahir') }}">
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                value="{{ old('jenis_kelamin') }}">
        </div>

        <div class="mb-3">
            <label for="rt_rw" class="form-label">Rt / Rw</label>
            <input type="text" class="form-control" name="rt_rw" id="rt_rw" value="{{ old('rt_rw') }}">
        </div>

        <div class="mb-3">
            <label for="kelurahan" class="form-label">Kelurahan</label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="{{ old('kelurahan') }}">
        </div>

        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}">
        </div>

        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <input type="text" class="form-control" name="agama" id="agama" value="{{ old('agama') }}">
        </div>

        <div class="mb-3">
            <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
            <input type="text" class="form-control" name="status_perkawinan" id="status_perkawinan"
                value="{{ old('status_perkawinan') }}">
        </div>


        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}">
        </div>

        <div class="mb-3">
            <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
            <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan"
                value="{{ old('kewarganegaraan') }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="4">

                {{ old('alamat') }}
            </textarea>
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>

    </form>



@endsection
