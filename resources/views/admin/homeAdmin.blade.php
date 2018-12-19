@extends('layouts.admin')

@section('content')
    <section>
        <h1>
            Mes jiries
        </h1>
        <ul>
            @foreach($user->jiries as $jiri)
            <li class="card-body" style="list-style: none; border: 1px solid lightgrey;">
                {{ $jiri->name }}
                <br>
                <button class="btn btn-primary">
                    Démarrer le Jiri
                </button>
                <button class="btn btn-primary">
                    Voir le Jiri
                </button>
            </li>
            @endforeach
        </ul>
    </section>
@endsection
