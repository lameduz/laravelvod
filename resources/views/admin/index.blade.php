@extends('adminlayout')

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


                        <tr>

                        </tr>



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


                        <tr>


                        </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection