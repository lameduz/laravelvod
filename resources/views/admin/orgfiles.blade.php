@extends('adminlayout')

@section('content')

    <div class="col-md-6">
        <div class="portlet-title"><h2>Fichiers reçus</h2></div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                <tr>
                    <th>
                        Nom du fichier
                    </th>
                    <th>
                        Action
                    </th>


                </tr>
                </thead>
                <tbody>

                    <tr>
                        @foreach($files as $file)
                        <td>{{$file->name}}</td>
                        <td><a href="{{ route('admin.download',['domain' => Route::input('name'),'filename' => $file->name]) }}" target="_blank">Télécharger</a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection