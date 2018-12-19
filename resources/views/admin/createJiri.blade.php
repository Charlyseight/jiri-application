@extends('layouts.admin')

@section('content')
    <section class="container">
        <h1>Création d'un Jiri</h1>
        <div class="card-body" style="border: 1px solid lightgray">
            <label for="jiriName">Nom du Jiri :</label>
            <input type="text" id="jiriName" name="jiriName" class="form-control">
            <br>
            <label for="projects">Projets présentés</label>
            <br>
            <input type="text" id="projects" name="projects" class="form-control">
            <br>
            <label for="date">Date:</label>
            <input class="form-control" type="date" name="date" id="date">
            <br>
            <label for="hour">L'heure : </label>
            <input class="form-control" type="time" id="hour" name="hour">
        </div>
        <br>
        <br>
        <div class="card-body" style="border: 1px solid lightgray">
            <h2>Ajouter un membre du Jiri</h2>
            <div class="card-body">
                <label for="jugesEx">Juges des années précédentes :</label>
                <br>
                <input type="search" name="jugesEx" id="jugesEx" class="form-control">
                <p>
                    Ajouter un nouveau membre
                </p>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        Lola Coucou Ciao
                        <button class="btn btn-danger">
                            Supprimer
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="card-body" style="border:1px solid lightgray";>
            <h2>
                Lier ce jiri à un groupe
            </h2>
            <p>
                Pas encore de groupe crée ? Pour valider ce jury vous êtes
                obliger de le lier à un groupe de personne. Pour en créer
                un cliquer sur le bouton « créer groupe ».
            </p>
            <button>
                Créer un groupe
            </button>
            <p>
                Vous avez déjà un groupe de créer ? Parfait !
                Sélectionnez-le juste en dessous.
            </p>
            <select name="jiriGroup" id="jiriGroup" class="form-control">
                <option value="Bloc 3 - Infographie - Web">Bloc 3 - Infographie - Web</option>
                <option value="Bloc 3 - Infographie - Web">Bloc 3 - Infographie - Technique graphisme</option>
            </select>
        </div>
        <br>
        <button class="btn btn-primary">Valider</button>
    </section>
@endsection
