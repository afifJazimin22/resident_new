@extends('layouts.master')
<nav class="navbar navbar-expand-lg navbar-light bg-nav">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Resident Management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('resident.index') }}"><span class="text-white"><i class="fa-solid fa-building-user me-2"></i>Resident Info</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('car.index') }}"><span class="text-white"><i class="fa-solid fa-car me-2"></i>Car Log History</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>