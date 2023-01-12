@extends('layouts.master')
@include('layouts.navbar')
@section('content')

    @include('resident.create')
    <div class="container-fluid pt-4 overflow-auto">
        <div class="row d-flex justify-content-center align-items-center px-5">
            {{-- <h1 class="text-white text-start">Resident Management</h1> --}}
            <div class="card border-1 col-12 m-3">
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="text-end">
                        <h1 class="text-dark text-start fw-bold"><i class="fa-solid fa-building-user fs-1 me-2"></i>Resident
                            Info
                        </h1>
                        <button class="btn btn-danger delete_all"><span><i class="fa-solid fa-trash me-2"></i>Delete
                                All</span></button>
                        <a id="addrecord" class="btn btn-success"><span><i class="fa-solid fa-file-circle-plus me-2"></i>Add
                                Record</span></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-white residenttable" id="residenttable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="select_all" id="select_all"></th>
                                    <th>#</th>
                                    <th>Matric Number</th>
                                    <th>Name</th>
                                    <th>Faculty</th>
                                    <th>Phone Number</th>
                                    <th>Room Number</th>
                                    <th>Car Plate Number</th>
                                    <th>Vehicle Type</th>
                                    <th>Vehicle Colour</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($resident == null)
                                    hi
                                @else
                                    @foreach ($resident as $key => $value)
                                        <tr>
                                            <td><input type="checkbox" name="checkbox" class="checkbox"
                                                    value="{{ $value->id }}"></td>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->faculty }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->roomNumber }}</td>
                                            <td>{{ $value->plateNumber }}</td>
                                            <td>{{ $value->carType }}</td>
                                            <td>{{ $value->carColour }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info p-1" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $value->id }}">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                                <div class="modal fade" id="editModal-{{ $value->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            {{-- @include('resident.edit') --}}
                                                            @include('resident.edit')
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('residents.delete', ['id' => $value->id]) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger _showconfirm p-1">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $resident->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#addrecord').click(function() {
                $('#createmodal').modal('show');
            });
        });

        $('._showconfirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    form.submit();
                }
            })
        });

        $('.submit-record').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Do you want to proceed with submittion?',
                text: "You can cancel if you hesitate",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Added!',
                        'Your record has been added.',
                        'success'
                    )
                    form.submit();
                }
            })
        });

        $(document).ready(function() {
            $('#select_all').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
            $(".checkbox").on('click', function() {
                if ($('.checkbox:check').length == $('.checkbox').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
                }
            });
            $(".delete_all").on('click', function(e) {
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).val());
                    // idsArr.push($(this).attr('data-id'));
                });

                console.log(idsArr);
                if (idsArr.length <= 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please select at least one record to delete!'
                    })
                } else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var strIds = idsArr.join(",");
                            console.log(idsArr);
                            $.ajax({
                                url: "{{ route('residents.massdelete') }}",
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                data: {
                                    user_ids: idsArr
                                },
                                // data: 'ids=' + strIds,
                                // data: {
                                //     user_ids: strIds,
                                //     _method: 'delete'
                                // },
                                success: function(data) {
                                    // console.log(response.message);
                                    if (data['success']) {
                                        $(".checkbox:checked").each(function() {
                                            $(this).parents("tr").remove();
                                        });
                                        Swal.fire(
                                            'Deleted!',
                                            strIds + ' Records deleted',
                                            'success'
                                        )
                                    } else if (data['error']) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oppss...',
                                            text: 'Something went wrong!'
                                        })
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Nope...',
                                            text: 'Something went wrong!'
                                        })
                                    }

                                },
                                error: function(data) {

                                    alert(data.responseText);
                                }
                            });
                            $.each(idsArr, function(index, value) {
                                $('table tr').filter("[data-row-id='" + value + "']")
                                    .remove();
                            });
                        }
                    })
                }
            });
        });
        $(document).ready(function() {

        });
    </script>
@endsection
