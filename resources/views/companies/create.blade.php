@extends('layouts')

@section('content')
    @include('alerts.errors')
    <div class="text-center">
        <h1 class="m-5">Create Company</h1>
        <div class="row mb-2">
            <div class="col-12 text-right ">
                <a href="{{route('companies.index')}}" class="btn bg-primary"> Back </a>
            </div>
        </div>
        <form method="POST" action="{{route('companies.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-4 col-form-label text-right"><b>Name :</b></label>
                <div class="col-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="" required>
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
                    <input id="email" type="email" class="form-control" name="email" value="" >
                </div>
            </div>
            <div class="form-group row">
                <label for="website" class="col-4 col-form-label text-right"><b>Website :</b></label>
                <div class="col-6">
                    <input id="website" type="text" class="form-control" name="website" value=""  >
                </div>
            </div>
            <div class="form-group row">
                <label for="logo" class="col-4 col-form-label text-right"><b>Logo :</b></label>
                <div class="col-6">
                    <input data-preview="#preview" name="logo" type="file" id="logo" class="form-control @error('logo') is-invalid @enderror" value="" >
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
                    <button type="submit" class="btn btn-primary blog_create">
                        {{-- {{isset($edit)? 'Edit' : 'Create Blog'}} --}}
                        Add Company
                    </button>
                </div>
            </div>
        </form>
    </div>





    </div>
@endsection


 @section('javascript')
    <script>
            function back() {
                window.history.back();
            }
    </script>
@endsection
