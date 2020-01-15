@extends('layouts')

@section('content')
    <div class="text-center">
        <h1 class="m-5">Show Employee</h1>
        <div class="row mb-2">
            <div class="col-12 text-right">
                <div class="col-12 text-right">
                    <a href="{{route('employees.index')}}" class="btn bg-primary"> Back </a>
                </div>
            </div>
        </div>
        <div>

            <h2>{{ $employee->firstname }}</h2>
            <h2>{{ $employee->lasttname }}</h2>
            <h2>{{ $employee->Company }}</h2>
            <h3>{{ $employee->email }}</h3>
            <h2>{{ $employee->phone }}</h2>
        </div>
    </div>
@endsection
