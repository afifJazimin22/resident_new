@extends('layouts.master')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100 overflow-hidden">
        <div class="row text-center align-items-center" style="overflow: hidden; width:50vw; height:50vh">


            <div class="card text-white bg-transparent border-0">
                <div class="card-body">
                    <h1 class="text-white fs-bold align-middle">Welcome To Resident Management System</h1>

                    <a href="{{ route('login') }}" class="col-2 btn btn-success text-center">Login</a>
                </div>
            </div>


        </div>
    </div>
@endsection
