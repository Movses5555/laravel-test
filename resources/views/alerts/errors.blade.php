@if ($errors->isNotEmpty())
    <div class="error_message alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $error)
            @if($error == "The email has already been taken")
                <li>The email has already been taken - <a href style="color: #A94442" data-toggle="modal" data-target="#log-in">Click here to login if it's yours</a></li>
            @else
                <li>{{ $error }}</li>
            @endif
        @endforeach
    </div>
@endif
@if (Session::has('error'))
    <div class="error_message alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p style='color: #a94442 !important'>{!! Session::get('error') !!}</p>
    </div>
@endif
@if (Session::has('success'))
    <div class="error_message alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
@if (Session::has('warning'))
    <div class="error_message alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>{{ Session::get('warning') }}</p>
    </div>
@endif
@if (Session::has('notice'))
    <div class="error_message alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>{{ Session::get('notice') }}</p>
    </div>
@endif
