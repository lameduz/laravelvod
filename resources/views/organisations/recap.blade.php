@extends('printlayout')

@section('content')
    <div class="nav navbar">
        <ul>
            <li><a href="{{url('dashboard')}}">Revenir au dashboard</a></li>
        </ul>
    </div>
    <div class="col-md-12">
    <h4 class="text-center">Identification entreprise</h4>
    </div>
    {!! Form::model($organisations,['route' => 'formtoprint.extra', $organisations['id']]) !!}
    <div class="form-group">
            {!! Form::label('org_name', 'Raison sociale') !!}
            {!! Form::text('org_name',null,['class' => 'form-control','readonly' => 'readonly'])!!}
            {!! Form::label('org_siren','Numero de SIREN') !!}
            {!! Form::text('org_siren',null,['class' => 'form-control','readonly' => 'readonly'])!!}
            {!! Form::label('org_ape_naf','APE NAF') !!}
            {!! Form::text('org_ape_naf',null,['class' => 'form-control','readonly' => 'readonly']) !!}

            {!! Form::label('city','Ville') !!}
            {!! Form::text('city',null,['class' => 'form-control','readonly' => 'readonly'])!!}
            {!! Form::label('country','Pays') !!}

            {!! Form::text('country',null,['class' => 'form-control','readonly' => 'readonly'])!!}

            {!! Form::label('zipcode','Code postal') !!}
            {!! Form::text('zipcode',null,['class' => 'form-control','readonly' => 'readonly']) !!}

            {!! Form::label('adress_1','Adresse 1') !!}
            {!! Form::text('adress_1',null,['class' => 'form-control','readonly' => 'readonly']) !!}

            {!! Form::label('adress_2','Adresse 2') !!}
            {!! Form::text('adress_2',null,['class' => 'form-control','readonly' => 'readonly']) !!}
    </div>

    {!! Form::close() !!}

    <div class="col-md-12">
        <h4 class="text-center">Identification client</h4>
    </div>
    {!! Form::model($contact, ['route' => 'formtoprint.extra', $contact->id]) !!}
    <div class="form-group">

            {!! Form::label('function','Mandataire social') !!}
            {!! Form::text('function',null,['class' => 'form-control','readonly' => 'readonly']) !!}
            {!! Form::label('name','Nom du contact')!!}
            {!! Form::text('name',null,['class' => 'form-control','readonly' => 'readonly']) !!}
            {!! Form::label('firstname','Prénom du contact') !!}
            {!! Form::text('firstname',null,['class' => 'form-control','readonly' => 'readonly']) !!}
            {!! Form::label('email','Adresse éléctronique') !!}
            {!! Form::email('email',null,['class' => 'form-control','readonly' => 'readonly']) !!}
            {!! Form::label('telephone','Telephone') !!}
            {!! Form::text('telephone',null,['class' => 'form-control','readonly' => 'readonly']) !!}
            {!! Form::label('mobile','Mobile') !!}
            {!! Form::text('mobile',null,['class' => 'form-control','readonly' => 'readonly'])!!}
    </div>
    {!! Form::close() !!}


    <div class="col-md-12">
        <h4 class="text-center">Coordonnées bancaires</h4>
    </div>
    {!! Form::model($bankaccount, ['route' =>  'formtoprint.extra', $bankaccount->id]) !!}
        <div class="form-group">


                {!! Form::label('bic', 'BIC') !!}
                {!! Form::text('bic',null,array('class' => 'form-control','readonly' => 'readonly')) !!}



                {!! Form::label('iban','IBAN') !!}
                {!! Form::text('iban',null,array('class' => 'form-control','readonly' => 'readonly')) !!}


        </div>
    {!! Form::close() !!}
    <div id="certif" class="col-md-12">
        <p class="text-left">JE CERTIFIE EXACTES, sous peine de nullité, les informations enregistrées sur la présente demande d'ouverture de compte.</p>
        <p class="text-left">J'accepte un paiement par prélèvement bancaire mensuel (obligatoire). A ce titre, je remplis l'autorisation de prélèvement SEPA fournie par VODO et je joins un relevé d'identité bancaire au format BIC/IBAN</p>

    </div>
    <div class="form-group" id="signature_cachet">


        <label for="fait_a">Fait à</label>
        <input type="text" id="fait_a" class="form-control" readonly>
        <label for="le">Le</label>
        <input type="text" id="le" class="form-control" readonly>
        <label for="function">Fonction</label>
        <input type="text" id="function" class="form-control" readonly>
        <label for="signature_cachet">Signature et cachet :</label>


    </div>

    <a href="javascript:window.print()">Imprimer ce document</a>


@endsection