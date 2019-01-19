@extends('layouts.app')

@section ('content')
    <div class="container">
        <h1>{{$currentJiri->name}} crée le {{ $currentJiri->createdDate }}</h1>
        <ul>
            @foreach($currentJiri->students as $student)
            <li>
                    {{ $student->name }}
                <br>
                @foreach($student->implementsForCurrentJiriWithProject as $implement)
                    <p>{{ $implement->project->name }} </p>
                @endforeach

                <a href="/student/{{$student->id}}">Voir ses projects</a>
                <hr>

            </li>
            @endforeach
        </ul>
    </div>
@endsection
