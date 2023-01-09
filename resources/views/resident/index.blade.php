@extends('layouts.master')
@include('layouts.navbar')
@section('content')

    @include('resident.create')
    @include('resident.show')
    @include('resident.edit')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center px-5">
            {{-- <h1 class="text-white text-start">Resident Management</h1> --}}
            <div class="card border-1 col-12 m-3">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <h1 class="text-dark text-start">Resident Info</h1>

                        <a id="addrecord" class="btn btn-success">Add Record</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-white" id="residenttable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="selectall" id="selectall"></th>
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
                                    @foreach ($resident as $value)
                                        <tr>
                                            <td><input type="checkbox" name="checkbox" id=""></td>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->faculty }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->roomNumber }}</td>
                                            <td>{{ $value->plateNumber }}</td>
                                            <td>{{ $value->carType }}</td>
                                            <td>{{ $value->carColour }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('resident.show', ['id' => $value->id]) }}"><i class="fa-solid fa-eye"></i></a>
                                                {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#showmodal-{{ $value->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                    <div id="showmodal-{{ $value->id }}" class="modal" tabindex="-1">
                                                        @include('resident.show')
                                                    </div> --}}
                                                <form action="{{ route('residents.delete', ['id' => $value->id]) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger _showconfirm">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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


    </script>
@endsection
