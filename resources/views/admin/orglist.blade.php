@extends('adminlayout')

@section('content')

<div class="col-md-12">
    <div class="portlet-title"><h2>Dernières ouvertures - Procédures en cours</h2></div>
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
                    Procédure
                </th>
                <th>
                    Etat
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($org as $orginfo)

            <tr>
                <td><a href="{{url('admin/organisation',['id' => $orginfo->id])}}">{{$orginfo->org_name}}</a></td>
                <td>{{ $orginfo->org_type }}</td>
                <td>{{ $orginfo->org_siren }}</td>
                <td>{{ $orginfo->adress_1}}</td>
                @foreach($orginfo->contacts as $continfo)
                <td><a href="{{url('admin/contact', ['id' => $continfo->id]) }}">{{$continfo->name .' '. $continfo->firstname}}</a></td>
                @endforeach
                @foreach($orginfo->processes as $statut)
                <td>{{ $statut->name}}</td>
                    @if($orginfo->files->count() > 0)
                    <td><a href="{{url('admin/organisation/files',['id' => $orginfo->id])}}">{{$orginfo->files->count().' documents reçus'}}</a></td>

                    @else
                        <td>Aucun document reçu</td>

                    @endif
                @endforeach


            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection