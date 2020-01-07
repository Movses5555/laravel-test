@extends('layouts')

@section('content')
    <div class="container-fluid" >
        <div class="menu">
            <div class="float-left links">
                <a href="{{ url('/company') }}">Companies</a>
            </div>
            <div class="float-left links">
                <a href="{{ url('/employee') }}">Employees</a>
            </div>
        </div>

        <h1 class='text-center m-5'>Dashbord</h1>
    </div>
@endsection
