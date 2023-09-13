@extends('layouts.Main')

@section('title', 'Testing UUID')

@section('content')


    <h1>Hello Saya Detail UUID {{ $product->name }} </h1>

    <p>ini adalah uuid {{ $product->id }}</p>






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
