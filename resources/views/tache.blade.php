<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('image/logo_onglet.png') }}" type="image/x-icon">
    <title>Tâche</title>
    @vite(['resources/css/tache.css', 'resources/js/tache.js'])
</head>

<body>
    <x-app-layout>
        <h1>Tâche</h1>
    </x-app-layout>
    <main id="tache">
        <section>
            <form action="" method="post">
                <div>
                    <input type="text" name="titre" id="titre" placeholder="Titre">
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                </div>
                <!-- balise date de création et date de cloture -->
                <div>
                    <input type="date" name="date_creation" id="date_creation">
                    <input type="date" name="date_cloture" id="date_cloture">
                    <!-- un champ de saisie d'une couleur -->
                    <input type="color" name="couleur" id="couleur">
                    <!-- une liste déroulante etiquette et statut -->
                    <select id="etiquette" name="etiquette">
                        <option value="1">Etiquette 1</option>
                        <option value="2">Etiquette 2</option>
                        <option value="3">Etiquette 3</option>
                    </select>
                    <select id="statut" name="statut">
                        <option value="1">En attente</option>
                        <option value="2">En cours</option>
                        <option value="3">Terminé</option>
                    </select>
                </div>
                <div>
                    <!-- une liste avec un checkbox -->
                    <!-- un range pour savoir combien de checkbox à était checked -->
                    <input type="range" name="range" id="range" min="0" max="3">
                    <ul>
                        <li>
                            <input type="checkbox" name="personne" id="personne">
                            <label for="personne">Personne 1</label>
                        </li>
                        <li>
                            <input type="checkbox" name="personne" id="personne">
                            <label for="personne">Personne 2</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Fpersonne" id="personne">
                            <label for="personne">Personne 3</label>
                        </li>
                    </ul>
                </div>
                <!-- un bouton pour valider -->
                <button>Valider</button>
                <!-- un bouton pour supprimer -->
                <button>Supprimer</button>
            </form>
        </section>

        <aside class="bloc" id="chat">
            <button>
                ajouter une personne <i class="fa-solid fa-user-plus"></i>
            </button>
            <!-- bloc div ou on aura le chat avec les messages envoyer et recu qui s'affiche -->
            <div class="message">
                <p>Message 1</p>
            </div>
            <!-- un champ ou on écrit le message -->
            <input type="text" name="message" id="message" placeholder="Écrire">
        </aside>
    </main>
</body>

</html>