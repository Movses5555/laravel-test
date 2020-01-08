@extends('layouts')

@section('content')
    <div class="mt-0">
        @include('auth.dashboard')
        <h1 class="text-center"><b>Companies</b></h1>
        <div class="mb-4 text-right">
            <form method="GET" action="{{route('company.create')}}" class="float-right mr-3">
                @csrf
                <button data-form="" type="submit" class="btn btn-sm bg-primary blog_create">
                    Add
                </button>
            </form>
        </div>
        <div>
            @if(count($companies) > 0)
                <table class="mt-5 col-12 table " >
                    <tr class="row text-center m-0">
                        <th class="col-2">Logo</th>
                        <th class="col-2">Name</th>
                        <th class="col-3">Email</th>
                        <th class="col-3">Website</th>
                        <th class="col-2">Action</th>
                    </tr>
                    @foreach ($companies as $item)
                        <tr class="row text-center m-0">
                        <td class="col-2 pt-2">
                            <img  src="{{asset('storage/'.$item->logo)}}" style="width: 50px; height:50px">
                        </td>
                        <td class="col-2 pt-2">{{ $item->name }}</td>
                            <td class="col-3 pt-2">{{ $item->email }}</td>
                            <td class="col-3 pt-2">{{ $item->website }}</td>
                            <td class="col-2">
                                <div class="blogs_btn">
                                    <div class="float-left mr-1" >
                                        <form method="GET" action="{{route('company.edit', $item->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm  bg-primary">
                                                <i style='font-size:18px' class='far'>&#xf044;</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="float-left mr-1" >
                                        <form method="GET" action="{{route('company.show', $item->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm  bg-primary">
                                                <i style="font-size:18px" class="fa">&#xf06e;</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="float-left mr-1" >
                                        <form method="POST" action="{{route('company.destroy', $item->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm bg-danger">
                                                <i style="font-size:18px;" class="fa">&#xf1f8;</i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
            <div class="text-center">
                <h2 class="noBlog">You don't have a Company</h2>
            </div>
            @endif
        </div>
        @if($companies->total() > $companies->count())
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $companies->links() }}
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection



