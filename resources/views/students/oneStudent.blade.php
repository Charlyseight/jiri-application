@extends('layouts.app')

@section ('content')
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <div class="container">
        <a href="/jiri/{{session('jiri_id')}}" class="btn btn-dark m-2">Retour</a>
        <br>
        <select name="student" id="student">
            @foreach($students->students as $oneStudent)
                <option value="{{$oneStudent->name}}">
                    {{$oneStudent->name}}
                </option>
            @endforeach
        </select>
        <h1>{{ $student->name }}</h1>
        <h2>Projets</h2>
        <ul>
            @foreach($student->implementsForCurrentJiriWithProjectAndScore as $implement)
                <li>
                    {{ $implement->project->name }}
                    <br>
                    {{ $implement->project->tags }}
                    <br>
                    @if($implement->scoreForOneProject->first())
                        <p>{{ $implement->scoreForOneProject->first()->score }}</p>
                        <p>{{ $implement->scoreForOneProject->first()->comment }}</p>

                        <a href="/score/{{ $implement->scoreForOneProject->first()->id}}/edit" class="btn btn-danger">
                            Modifier la note
                        </a>
                    @else
                        <a href="/student/{{ $student->id }}/project/{{ $implement->project->id }}"
                           class="btn btn-primary">
                            Donner une note
                        </a>
                    @endif
                </li>
                <br>
                <hr>
            @endforeach
        </ul>
        @if($impressionForCurrentJiri->first())
            <p>La note d'appréciation pour tous les projects
                : {{ $impressionForCurrentJiri->first()->impression_score }}</p>
            <h3>Modifier la note d'appréciation</h3>
            <form action="/impression/{{ $impressionForCurrentJiri->first()->id }}" method="post">
                @method('patch')
                @csrf
                <label for="impression_score">
                    Appréciation générale
                </label>
                <br>
                <input type="number" name="impression_score" id="impression_score"
                       value="{{ $impressionForCurrentJiri->first()->impression_score }}">
                <span>sur 20</span>
                <br>
                <label for="impression_comment">Commentaires</label>
                <br>
                <textarea name="impression_comment" id="impression_comment" cols="30"
                          rows="10">{{ $impressionForCurrentJiri->first()->impression_comment }}</textarea>
                <br>
                <input type="submit" value="Valider">
            </form>
        @else
            <h3>Note d'appréciation</h3>
            <p>Note non obligatoire</p>
            <form action="/impression" method="post">
                @csrf
                <input type="hidden" name="jiri_id" value="{{session('jiri_id')}}">
                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                <input type="hidden" name="student_id" value="{{$student->id}}">
                <label for="impression_score">
                    Appréciation générale
                </label>
                <br>
                <input type="number" name="impression_score" id="impression_score">
                <span>sur 20</span>
                <br>
                <label for="impression_comment">Commentaires</label>
                <br>
                <textarea name="impression_comment" id="impression_comment" cols="30" rows="10"></textarea>
                <br>
                <input type="submit" value="Valider">
            </form>
    </div>
    @endif
@endsection
