@php
$projets = \App\Models\Projet::all()->sortBy("id");
@endphp
<div>
    <h2>Liste projets :</h2>
    <a id="creerProjet" onclick="ajouterProjet()">
        <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 512 512">
            <style>
                svg {
                    fill: #eeca57
                }
            </style>
            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
        </svg>
    </a>
</div>

<ul id="listeProjets">
    @foreach ($projets as $projet)
    <li id="{{ $projet->id }}">
        {{ $projet->designation }}
        <div>
            <a class="update-projet" name="{{ $projet->id }}">
                <i class="fa-solid fa-pen"></i>
            </a>
            <a class="delete-projet" name="{{ $projet->id }}">
                <i class="fa-solid fa-trash">
                </i>
            </a>
        </div>
    </li>
    @endforeach
</ul>