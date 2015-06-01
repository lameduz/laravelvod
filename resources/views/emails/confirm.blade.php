<div class="col-md-8">
<h1>Bonjour <span>{{$firstname}}</span>,</h1>
    <p>Votre identifiant est : {{$username}}</p>
    <p>Votre mot de passe est : {{$password}}</p>
    <h3><a href="{!! route('organisations.confirm.'.$rname, ['domain' => $subdomain, 'token' => $token]) !!}">Confirmer la création de votre compte client</a></h3>
</div>