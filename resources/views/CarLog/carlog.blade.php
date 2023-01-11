@extends('layouts.master')
@include('layouts.navbar')
@section('content')
    <div class="container-fluid pt-4">
        <div class="row d-flex justify-content-center align-items-center px-5">
            {{-- <h1 class="text-white text-start">Resident Management</h1> --}}
            <div class="card border-1 col-12 m-3">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <h1 class="text-dark text-start fw-bold pb-5"><i class="fa-solid fa-car-on me-2 fs-1"></i>Car Logs
                            History
                        </h1>

                        {{-- <a id="addrecord" class="btn btn-success">Add Record</a> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-white" id="residenttable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car Plate Number</th>
                                    <th>Description</th>
                                    <th>Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($carLog == null)
                                    hi
                                @else
                                    @foreach ($carLog as $value)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $value->plateNumber }}</td>
                                            <td>{{ $value->Description }}</td>
                                            <td>{{ $value->created_at }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex">
                            {!! $carLog->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
