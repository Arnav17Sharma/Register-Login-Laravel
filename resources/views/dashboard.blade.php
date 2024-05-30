@extends('layout') 
@section('title', 'Dashboard')
@section('content')
    <!-- {{auth()->user()->username}} -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feature1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feature2</a>
                </li>
                </ul>
                <span class="navbar-text">
                Navbar text with an inline element
                </span>
            </div>
        </div>
    </nav>
    <div class="mt-5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <div class="card ms-auto me-auto mt-5" style="width: 18rem;">
        <div class="card-body" style="width: auto;">
            <h5 class="card-title">{{auth()->user()->username}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">ID: {{auth()->user()->id}}</h6>
            <p class="card-text">{{auth()->user()->email}}</p>
        </div>
    </div>
@endsection