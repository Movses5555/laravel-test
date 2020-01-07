@extends('layouts')

@section('content')
    <div>
        <h1 class="text-center m-5">Edit Employee</h1>
        <form method="POST" action="{{route('employee.update', $editEmpl->id)}}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group row">
                <label for="firstname" class="col-4 col-form-label text-right"><b>First Name :</b></label>
                <div class="col-6">
                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"  value="{{$editEmpl->firstname}}" required>
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
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  value="{{$editEmpl->lastname}}" required>
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
                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company"  value="{{$editEmpl->company}}" required>
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
                    <input id="email" type="email" class="form-control" name="email" value="{{$editEmpl->email}}" >
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-4 col-form-label text-right"><b>Phone :</b></label>
                <div class="col-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{$editEmpl->phone}}"  >
                </div>
            </div>

            <div class="form-group row mb-0">
                <label for="button" class="col-4 col-form-label text-right"></label>
                <div class="col-6 text-left">
                    <button type="submit" class="btn btn-primary blog_create">
                        Edit Employee
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
