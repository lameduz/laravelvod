@extends('app')


@section('content')
    <div class="col-md-6">
        {!! Form::model($organisation, ['route' => 'admin.organisation.show','org' => $organisation->id,'class'=>'form-horizontal']) !!}
        <div class="portlet-title"><h1>Fiche de l'organisation {{$organisation->org_name}}</h1></div>
        <div class="portlet-body blue">
            <div class="form-group">

                <div class="col-md-6">
                    {!! Form::label('name','Nom') !!}
                    {!! Form::text('org_name',null,['class'=> 'form-control'])!!}
                    {!! Form::label('org_type','Type') !!}
                    {!! Form::text('org_type',null,['class'=> 'form-control'])!!}
                    {!! Form::label('siren','Numéro de SIREN') !!}
                    {!! Form::text('org_siren',null,['class'=> 'form-control']) !!}
                    {!! Form::label('org_ape_naf','Numéro APE NAF') !!}
                    {!! Form::text('org_ape_naf',null,['class'=> 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    {!! Form::label('adress_1','Adresse n°1') !!}

                    {!! Form::text('adress_1',null,['class'=> 'form-control']) !!}
                    {!! Form::label('adress_2','Adresse n°2') !!}
                    {!! Form::text('adress_2',null,['class'=> 'form-control']) !!}
                    {!! Form::label('zipcode','Code postal') !!}

                    {!! Form::text('zipcode',null,['class'=> 'form-control']) !!}
                    {!! Form::label('city','Ville') !!}

                    {!! Form::text('city',null,['class'=> 'form-control']) !!}
                    {!! Form::label('country','Pays') !!}

                    {!! Form::text('country',null,['class'=> 'form-control']) !!}
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-md-5">
        <div class="portlet-title"><h1>Liste des sites</h1></div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                <tr>
                    <th>
                        Nom du site
                    </th>
                    <th>
                        Adresse n°1
                    </th>
                    <th>
                        N° de SIREF
                    </th>
                    <th>
                        Ville
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($organisation->sites as $site)
                    <tr>
                        <th>{{$site->name}}</th>
                        <th>{{$site->adress_1}}</th>
                        <th>{{$site->siref}}</th>
                        <th>{{$site->city}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-5">
        <div class="portlet-title"><h1>Compte bancaire</h1></div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                <tr>
                    <th>
                        BIC
                    </th>
                    <th>IBAN</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{$organisation->bankaccount->bic}}</th>
                    <th>{{$organisation->bankaccount->iban}}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection