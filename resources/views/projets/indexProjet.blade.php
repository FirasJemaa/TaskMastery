@php
// Appel direct du contrôleur
$projetController = app(\App\Http\Controllers\ProjetController::class);
$projets = $projetController->index();
@endphp
<div>
    <h2>Liste projets</h2>
    <a id="creerProjet" onclick="ajouterProjet()">
        <i class="fa-solid fa-circle-plus"></i>
    </a>
    <a title="Voir les tâches attribué" id="creerProjet" href="{{route('indexAttribution')}}">
        <i class="fa-brands fa-slideshare"></i>    
    </a>
</div>

<ul id="listeProjets">
    @foreach ($projets as $projet)
    <li id="{{ $projet->id }}">
        {{ $projet->designation }}
        <div>
            <a class="update-projet" name="{{ $projet->id }}"><i class="fa-solid fa-pen"></i></a>
            <a class="delete-projet" name="{{ $projet->id }}"><i class="fa-solid fa-trash"></i></a>
        </div>
    </li>
    @endforeach
</ul>