@extends('layouts.app');

@section ('content')
    <h1>{{ $student->name }}</h1>
    <h2>Projets</h2>
    <ul>
            @foreach($student->implementsForCurrentJiriWithProject as $implement)
                <li>
                    {{ $implement->project->name }}
                    <br>
                    {{ $implement->project->tags }}
                </li>
        <br>
            <a href="/student/{{ $student->id }}/project/{{ $implement->project->id }}">
                Donner une note
            </a>
            <hr>
            @endforeach
    </ul>
@endsection
