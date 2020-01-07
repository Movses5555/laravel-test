@extends('layouts')

@section('content')
    <div class >
        <h1 class='text-center m-5'>Login</h1>
        <form method="POST" action="{{url('/login')}}" enctype="multipart/form-data" class="was-validated">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label text-right"> <b>Email :</b> </label>
                <div class="col-6">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-group row">
                <label for="pwd" class="col-4 col-form-label text-right"> <b>Password :</b> </label>
                <div class="col-6">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required minlength="4">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <label for="button" class="col-4 col-form-label text-right"></label>
                <div class="col-6 text-left">
                    <button type="submit" class="btn btn-primary blog_create">
                        Submit
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
