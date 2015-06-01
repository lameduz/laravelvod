@extends('app')

@section('content')
<div class="col-md-6">
    @if(Session::has('message'))
        <div class="panel-body">
            <p style="color:#ff0000" class="text-center">{{Session::get('message')}}</p>
        </div>
    @endif
</div>

@endsection