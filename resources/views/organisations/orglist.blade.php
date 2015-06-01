@extends('app')

@section('content')

<div class="col-md-12">
    <div class="portlet-title"><h2>Liste des organisations</h2></div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
            <tr>
                <th>
                    Organisation
                </th>
                <th>
                    Forme juridique
                </th>
                <th>
                    SIRENE
                </th>
                <th>
                    Adresse
                </th>
                <th>
                    Mandataire
                </th>
                <th>
                    Statut
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($org as $orginfo)

            <tr>
                <td>{{ $orginfo->org_name }}</td>
                <td>{{ $orginfo->org_type }}</td>
                <td>{{ $orginfo->org_siren }}</td>
                <td>{{ $orginfo->adress_1}}</td>
                @foreach($orginfo->contacts as $continfo)
                <td>{{ $continfo->name }}</td>
                @endforeach
                @foreach($orginfo->processes as $statut)
                <td>{{ $statut->name}}</td>
                @endforeach

            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection