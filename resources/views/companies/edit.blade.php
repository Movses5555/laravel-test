@extends('layouts')

@section('content')
    <div>
        <h1 class="text-center m-5">Edit Company</h1>
        <form method="POSt" action="{{route('companies.update', $company->id)}}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label text-right"><b>Name :</b></label>
                <div class="col-6">
                <input id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{$company->name}}"
                    required
                >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label text-right"><b>Email :</b></label>
                <div class="col-6">
                    <input id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        value="{{$company->email}}"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label for="website" class="col-4 col-form-label text-right"><b>Website :</b></label>
                <div class="col-6">
                    <input id="website"
                        type="text"
                        class="form-control"
                        name="website"
                        value="{{$company->website}}"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label for="logo" class="col-4 col-form-label text-right"><b>Logo :</b></label>
                <div class="col-6">
                    <input data-preview="#preview"
                        name="logo"
                        type="file"
                        id="logo"
                        class="form-control @error('logo') is-invalid @enderror"
                    >
                    <img src="{{asset('storage/'.$company->logo)}}"
                        alt="{{$company->logo}}"
                        style="width:50px; height:50px"
                    >
                    @error('logo')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <label for="button" class="col-4 col-form-label text-right"></label>
                <div class="col-6 text-left">
                    <button type="submit" class="btn btn-primary">
                        Edit Company
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
