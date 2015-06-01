@extends('printlayout')

@section('content')
    <div class="nav navbar">
        <ul>
            <li><a href="{{url('dashboard')}}">Revenir au dashboard</a></li>
        </ul>
    </div>
    <div class="col-md-12">
        <h4 class="text-center">CREANCIER</h4>
        <div class="form-group">
            <label for="creancier">Créancier</label>
            <input type="text" readonly="readonly" value="VODO SAS" class="form-control">
            <label for="ICS">ICS</label>
            <input type="text" readonly="readonly" value="FR58ZZZ625101" class="form-control">
        </div>
        <p>Pour régler automatiquement vos factures VODO par prélèvement bancaire, merci de remplir la demande
            et l'autorisation de prélèvement ci-dessous et les renvoyer via l'espace prévu à cet effet</p>
    </div>
    <div class="col-md-12">
        <h4 class="text-center">CLIENT DEBITEUR</h4>
    </div>
    {!! Form::model($organisations,['route' => 'formtoprint.extra', $organisations['id']]) !!}
    <div class="form-group">
        {!! Form::label('org_name', 'Raison sociale') !!}
        {!! Form::text('org_name',null,['class' => 'form-control','readonly' => 'readonly'])!!}



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
        <h4 class="text-center">Coordonnées bancaires</h4>
    </div>
    {!! Form::model($bankaccount, ['route' =>  'formtoprint.extra', $bankaccount->id]) !!}
    <div class="form-group">


        {!! Form::label('bic', 'BIC') !!}
        {!! Form::text('bic',null,array('class' => 'form-control','readonly' => 'readonly')) !!}



        {!! Form::label('iban','IBAN') !!}
        {!! Form::text('iban',null,array('class' => 'form-control','readonly' => 'readonly')) !!}
        {!! Form::label('paytype','Type de paiement') !!}
        <input type="checkbox" readonly="readonly" checked> Paiement récurrent / répétitif</input>
    </div>
    {!! Form::close() !!}
    <div class="form-group">
        <label for="application_champ">Champ d'application du mandat: </label>
        <input type="checkbox" readonly="readonly" checked> Applicable à l'ensemble des contrats conclus avec VODO</input>
    </div>

    <div class="form-group" id="signature_cachet">


        <label for="fait_a">Fait à</label>
        <input type="text" id="fait_a" class="form-control">
        <label for="le">Le</label>
        <input type="text" id="le" class="form-control">

        <label for="signature_cachet">Signature et cachet :</label>


    </div>

    <a href="javascript:window.print()">Imprimer le document</a>

@endsection