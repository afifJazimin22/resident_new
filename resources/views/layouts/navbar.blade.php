@extends('layouts.master')
<nav class="navbar navbar-expand-lg navbar-light bg-nav sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand text-color px-3" href="#"><img
                src="{{ asset('images/Realistic-sakura-or-cherry-blossom-Premium-vector-PNG.png') }}" class="sakura-img">
            Sakura
            Residence</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="px-5 mx-5 navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('resident') ? 'active' : '' }} text-color"
                        href="{{ route('resident.index') }}"><i
                            class="fa-solid fa-building-user fs-5 me-2"></i>Residents
                        Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('carlog') ? 'active' : '' }} text-color"
                        href="{{ route('car.index') }}"><i class="fa-solid fa-car-on me-2 fs-5"></i>Car Log History</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-color" href="{{ route('logout') }}"><i
                            class="fa-solid fa-right-from-bracket fs-5 me-2"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
