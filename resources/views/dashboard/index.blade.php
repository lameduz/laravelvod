    @extends('app')

    @section('content')
        <div class="col-md-5">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe">Mes dernieres ouvertures de comptes</i>
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    Organisation
                                </th>
                                <th>
                                    Adresse
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Formulaire d'ouverture
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach($contorg as $org)
                                    <tr>
                                <td>{{$org->org_name}}</td>
                                 <td>{{$org->adress_1}}</td>
                                <td>{{$org->created_at}}</td>
                                        <td>
                                            <a href="{{route('formtoprint.'.$rname,['domain' => Route::input('name'),'id' => $org->id])}}">Mon formulaire</a>
                                            <a href="{{route('sepatoprint.'.$rname,['domain' => Route::input('name'),'id' => $org->id])}}">Mandat Sepa</a>
                                        </td>

                                    </tr>
                                @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe">Mes dernières procédures</i>
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>
                                    Organisation
                                </th>
                                <th>
                                    Procédure
                                </th>
                                <th>
                                    Status
                                </th>

                                <th>
                                    Action
                                </th>



                            </tr>
                        </thead>
                        <tbody>

                                @foreach($contorg as $org)
                                    <tr>
                                <td>{{$org->org_name}}</td>
                                @foreach($processes  as $process)
                                    <td>{{$process->name}}</td>
                                    @if($process->status == 0)
                                            <td>Dans l'attente de documents</td>
                                            <td><a href="{{route('contactorg.upload.'.$rname, ['domain' => Route::input('name'),'contactid' => $org->pivot->contact_id,'orgId' => $org->pivot->organisation_id])}}">Envoyer vos documents</a></td>
                                    @elseif($process->status == 1)
                                            <td>Dossier en cours de traitement</td>
                                            <td><a href="#">Details</a></td>
                                        @else
                                            <td>Votre compte client est ouvert</td>
                                            <td><a href="#">Details</a></td>
                                        @endif
                                    </tr>

                                @endforeach
                                @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection