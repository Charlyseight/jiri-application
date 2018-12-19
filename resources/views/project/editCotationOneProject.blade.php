@extends('layouts.app')

@section ('content')
    <h1>{{ $currentStudent->name }}</h1>
    <h2>Cotations</h2>
    <select name="student" id="student">
        @foreach($students->students as $oneStudent)
            <option value="{{$oneStudent->name}}">
                {{$oneStudent->name}}
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
        {{ $currentStudent->implementsForCurrentJiriWithProject->first()->project->name }}
        <br>
        {{ $currentStudent->implementsForCurrentJiriWithProject->first()->project->tags }}
    </h3>
    <div>
        <p>
            Note obligatoire
        </p>
        <form action="/score/{{ $score->id }}" method="post">
            @method('patch')
            @csrf
            <label for="score">
                Points pour le projet
            </label>
            <input type="number" name="score" id="score" value="{{ $score->score }}">
            <span>sur 20</span>
            <br>
            <label for="comment">Commentaires</label>
            <br>
            <textarea name="comment" id="comment" cols="30" rows="10">{{ $score->comment }}</textarea>
            <br>
            <input type="submit" value="Valider">
        </form>
    </div>



@endsection

