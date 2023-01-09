@extends('layouts.master')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100 overflow-hidden">
        <div class="row text-center align-items-center" style="overflow: hidden; width:50vw; height:50vh">
            <div class="card text-white bg-transparent border-0 col-6 offset-3">
                <div class="card-body">
                    <h1 class="text-center text-white mb-3">Login</h1>
                    <form method="POST" action="{{ route('login.action') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa-solid fa-user text-white fs-5"></i>

                                </div>
                                <div class="col-11">

                                    <input type="text" placeholder="Username" id="username" class="form-control"
                                        name="username" value="{{ old('username') }}" required autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa-solid fa-lock text-white fs-5"></i>

                                </div>
                                <div class="col-11">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" value="{{ old('password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-11 text-end d-grid mb-2 offset-1">
                            <button type="submit" class="btn btn-dark btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
