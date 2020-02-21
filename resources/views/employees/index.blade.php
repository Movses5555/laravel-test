@extends('layouts')

@section('content')
    <div class="mt-0">
        <h1 class="text-center"><b>Employees</b></h1>
        <div class="mb-4 mr-4 text-right">
            <form method="GET" action="{{route('employees.create')}}" class="float-right mr-3">
                @csrf
                <button data-form="" type="submit" class="btn btn-sm bg-primary blog_create">
                    Add
                </button>
            </form>
        </div>
        <div>

            @if(count($employees) > 0)
                <table class="mt-5 col-12 table " >
                    <tr class="row text-center m-0">
                        <th class="col-2">First Name</th>
                        <th class="col-2">Last Name</th>
                        <th class="col-2">Company</th>
                        <th class="col-2">Email</th>
                        <th class="col-2">Phone</th>
                        <th class="col-2">Action</th>
                    </tr>
                    @foreach ($employees as $item)
                        <tr class="row text-center m-0">
                            <td class="col-2 pt-2">{{ $item->firstname }}</td>
                            <td class="col-2 pt-2">{{ $item->lastname }}</td>

                                    <td class="col-2 pt-2">{{ $item ->company->name }}</td>

                            <td class="col-2 pt-2">{{ $item->email }}</td>
                            <td class="col-2 pt-2">{{ $item->phone }}</td>
                            <td class="col-2 text-center">
                                <div class="row">
                                    <div class="float-left mr-2 col-3" >
                                        <form method="GET" action="{{route('employees.edit', $item->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm  bg-primary">
                                                <i style='font-size:18px' class='far'>&#xf044;</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="float-left mr-2 col-3" >
                                        <form method="GET" action="{{route('employees.show', $item->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm  bg-primary">
                                                <i style="font-size:18px" class="fa">&#xf06e;</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="float-left mr-2 col-3" >
                                        <form method="POST" action="{{route('employees.destroy', $item->id)}}">
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
                    <h2 class="noBlog">You don't have a Employee</h2>
                </div>
            @endif
        </div>
        @if($employees->total() > $employees->count())
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
