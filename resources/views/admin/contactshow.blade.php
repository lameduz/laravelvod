@extends('adminlayout')


@section('content')
    <div class="col-md-6">
        {!! Form::model($contact, ['route' => 'admin.contact.show','org' => $contact->id,'class'=>'form-horizontal']) !!}
    <div class="portlet-title"><h1>Fiche de {{$contact->name .' '.$contact->firstname}}</h1></div>
    <div class="portlet-body blue">
        <div class="form-group">

            <div class="col-md-6">
                {!! Form::label('name','Nom') !!}
                {!! Form::text('name',null,['class'=> 'form-control','readonly'])!!}
                {!! Form::label('firstname','Prénom') !!}
                {!! Form::text('firstname',null,['class'=> 'form-control','readonly'])!!}
                {!! Form::label('username','Nom d\'utilisateur') !!}
                {!! Form::text('username',null,['class'=> 'form-control','readonly']) !!}
            </div>

        </div>
        <div class="form-group">

            <div class="col-md-6">
                {!! Form::label('email','Adresse éléctronique') !!}
                {!! Form::text('email',null,['class'=> 'form-control','readonly'])!!}
                {!! Form::label('telephone','Téléphone fixe') !!}
                {!! Form::text('telephone',null,['class'=> 'form-control','readonly']) !!}
                {!! Form::label('mobile','Telephone mobile') !!}
                {!! Form::text('mobile',null,['class'=> 'form-control','readonly']) !!}
            </div>

        </div>
    </div>

        {!! Form::close() !!}
    </div>

<div class="col-md-5">
    <div class="portlet-title"><h1>Liste d'organisations</h1></div>
    <div class="portlet-body">
    <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
        <tr>
            <th>
                Organisation
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($contact->organisations as $org)
            <tr>
                <td><a href="{{url('admin/organisation',['id' => $org->id])}}">{{$org->org_name}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection