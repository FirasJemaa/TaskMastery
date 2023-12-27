<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/tache.css', 'resources/js/tache.js'])
    <title>Tâche</title>
</head>

<body>
    <form>
        <div class="bloc" id="dependance">

        </div>
        <div class="bloc" id="main">
            <select id="statut" name="statut">
                <option value="1">En attente</option>
                <option value="2">En cours</option>
                <option value="3">Terminé</option>
            </select>
        </div>
        <div class="bloc" id="chat">
            <button>
                ajouter une personne <i class="fa-solid fa-user-plus"></i>
            </button>
        </div>
        <div class="bloc">
            <input type="submit" value="Soumettre">
        </div>
    </form>
</body>

</html>