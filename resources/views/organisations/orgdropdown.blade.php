@extends('app')

@section('orgdropdown')
    <li>
        <a href="javascript:;"><span class="title">Mes organisations</span></a>
        <ul class="sub-menu">
            <li class="active">
            @foreach($contact->organisations as $org)
            <li><a href="{{ route('contacts.organisations.show.'.$rname,['domain' => Route::input('name'),'contactId' => Auth::user()->id,'orgId' => $org->id]) }}">{{$org->org_name}}</a></li>
            @endforeach
        </ul>
    </li>
@endsection