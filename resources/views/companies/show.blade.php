@extends('layouts')

@section('content')
    <div class="text-center">
        <h1 class="m-5">Show Company</h1>
        <div class="row mb-2">
            <div class="col-12 text-right">
                <div class="col-12 text-right">
                    <a href="{{route('companies.index')}}" class="btn bg-primary"> Back </a>
                </div>
            </div>
        </div>
        <div>
            <div style="margin: 20px auto">
               <img src="{{asset('storage/'.$company->logo)}}" alt={{$company->logo}} style='width: 400px; height:300px' >
            </div>
            <h2>{{ $company->name }}</h2>
            <h3>{{ $company->email }}</h3>
            <h2>{{ $company->website }}</h2>
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
