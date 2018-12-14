@extends('layouts.app')

@section ('content')
    <h1>{{ $currentStudent->name }}</h1>
    <h2>Cotations</h2>
    <select name="student" id="student">
        @foreach($students as $student)
                <option value="{{$student->name}}">
                        {{$student->name}}
                </option>
        @endforeach
    </select>
    <br>
    @foreach($implements->implementsForCurrentJiriWithProject as $implement)
        <a href="/student/{{ $currentStudent->id }}/project/{{ $implement->project->id }}">
            {{ $implement->project->name }}
        </a>
    @endforeach
    <h3>
        {{ $project->name }}
    </h3>
    <div>
        <p>
            Note obligatoire
        </p>
        <form action="/scores" method="post">
            @csrf
            <label for="points">
                Points pour le projet
            </label>
            <input type="number" name="points" id="points">
            <span>sur 20</span>
            <br>
            <label for="comment">Commentaires</label>
            <br>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" value="Valider">
        </form>
    </div>



@endsection
