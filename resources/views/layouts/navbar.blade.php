@extends('layouts.master')
<nav class="navbar navbar-expand-lg navbar-light bg-nav">
    <div class="container-fluid">
        <a class="navbar-brand text-color px-3" href="#">Sakura Residence</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="px-5 mx-5 navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('resident') ? 'active' : '' }} text-color" aria-current="page"
                        href="{{ route('resident.index') }}"><span><i
                                class="fa-solid fa-building-user me-2 text-color"></i>Residents
                            Info</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('test') ? 'active' : '' }} text-color"
                        href="{{ route('test.index') }}">Test</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-color" href="{{ route('logout') }}"><span><i
                                class="fa-solid fa-right-from-bracket me-2"></i>Logout</span> </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
