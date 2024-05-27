@php
// Appel direct du contrôleur
$projetController = app(\App\Http\Controllers\ProjetController::class);
$projets = $projetController->index();
@endphp

<body>
    <!-- ajouter un bouton pour créer un projet -->
    <a href="{{ route('indexTaches', [0]) }}" class="btn btn-primary">Ajouter un projet</a>

    <!-- Tableau des projets bootstrap -->
<table class="table table-bordered table-striped" id="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Designation</th>
            <th>Description</th>
            <th>Consulter</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projets as $projet)
        <tr>
            <td>{{ $projet->id }}</td>
            <td>{{ $projet->designation }}</td>
            <td>{{ $projet->description }}</td>
            <td>
                <!-- bouton qui m'envoie vers la vue dashboard.blade.php -->
                <a href="{{ route('indexTaches', ['id' => $projet->id]) }}" class="btn btn-primary">Consulter</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</body>