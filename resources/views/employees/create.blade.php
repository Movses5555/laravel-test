@extends('layouts')

@section('content')
    <div class="text-center">
        <h1 class="m-5">Create Company</h1>
        <div class="row mb-2 mr-3">
            <div class="col-12 text-right ">
                <a href="{{route('employees.index')}}" class="btn bg-primary"> Back </a>
            </div>
        </div>
        <form method="POST" action="{{route('employees.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="firstname" class="col-4 col-form-label text-right"><b>First Name :</b></label>
                <div class="col-6">
                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"  value="" required>
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-4 col-form-label text-right"><b>Last Name :</b></label>
                <div class="col-6">
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  value="" required>
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="company" class="col-4 col-form-label text-right"><b>Company :</b></label>
                <div class="col-6">
                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company"  value="" required>
                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label text-right"><b>Email :</b></label>
                <div class="col-6">
                    <input id="email" type="email" class="form-control" name="email" value="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-4 col-form-label text-right"><b>Phone :</b></label>
                <div class="col-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <label for="button" class="col-4 col-form-label text-right"></label>
                <div class="col-6 text-left">
                    <button type="submit" class="btn btn-primary blog_create">
                        Add Employee
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
