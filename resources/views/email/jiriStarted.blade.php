<h1>
    Bonjour {{ $user->name }}
</h1>
<div>
    <a href="{{config('app.url')}}/token/{{ $user->token }}">
        Cliquer ici pour vous rendre sur l'application Jiri
    </a>
</div>

