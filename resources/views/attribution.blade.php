<!--DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('image/logo_onglet.png') }}" type="image/x-icon">
    <title>Les tâches partager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @vite(['resources/css/attribution.css', 'resources/js/attribution.js'])
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>-->
<x-app-layout>
    <h1>Tâche partager</h1>
</x-app-layout>
<body>
    
    <main>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de création</th>
                    <th>Propriétaire</th>
                    <th>Designation</th>
                    <th>Statut</th>
                    <th>Ouvrir</th>
                    <th>Quitter</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taches as $tache)
                <tr>
                    <td>{{ $tache->titre }}</td>
                    <td>{{ $tache->date_creation }}</td>
                    <td>{{ $tache->pseudo }}</td>
                    <td>{{ $tache->designation }}</td>
                    <td>{{ $tache->DS }}</td>
                    <td><a href="Tache/{{{ $tache->id }}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                    <td><a class="suppElement" name="{{{ $tache->id_attribution }}}"><i class="fa-solid fa-door-open"></i></a></td>   
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>