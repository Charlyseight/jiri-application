@extends('layouts.app')

@section ('content')
    <h1>{{$currentJiri->name}} {{--{{ $currentJiri->createdDate }}--}}</h1>
<ul>
    @foreach($currentJiri->students as $student)
    <li>
            {{ $student->name }}
        <br>
        @foreach($student->implementsForCurrentJiriWithProject as $implement)
            <div>{{ $implement->project->name }} </div>
        @endforeach

        <a href="/student/{{$student->id}}">Voir ses projects</a>
        <hr>

    </li>
    @endforeach
</ul>
@endsection
