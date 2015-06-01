@extends('app')
@section('content')
    <div class="col-md-8">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe">Envoyer vos documents</i>
                </div>
                <div class="tools">
                </div>
            </div>
        </div>
        <div class="portlet-body">
           {!! Form::open(array('route'=> ['contactorg.upload.'.$rname,'domain' => Route::input('name'),'contactId' => $contactId,'orgId' => $orgId],'files'=> true,'multiple' => true )) !!}
            {!! Form::label('form_ouverture','Formulaire d\'ouverture') !!}
            {!! Form::file('form_ouverture',['class' => 'form-control'])!!}
            {!! Form::label('mandat_sepa','Mandat de prélèvement SEPA') !!}
            {!! Form::file('mandat_sepa',['class' => 'form-control']) !!}
            {!! Form::label('kbis','KBIS') !!}
            {!! Form::file('kbis',['class' => 'form-control']) !!}
            {!! Form::label('rib') !!}
            {!! Form::file('rib', ['class' => 'form-control'])!!}
            {!! Form::submit('Submit',['class' => 'button btn']) !!}

            {!! Form::close() !!}
        </div>
@endsection