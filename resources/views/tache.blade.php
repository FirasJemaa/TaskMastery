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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <x-app-layout>
        <h1>Tâche</h1>
    </x-app-layout>
    <main id="tache">
        <section>
            <form action="" method="post" class="wrapper">

                <div class="one item">
                    <input type="text" name="titre" id="titre" placeholder="Titre">
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                </div>
                <!-- balise date de création et date de cloture -->
                <div class="two item">
                    <input type="date" name="date_creation" id="date_creation">
                    <input type="date" name="date_cloture" id="date_cloture">
                    <!-- un champ de saisie d'une couleur -->
                    <div id="choixCouleur">
                        <label for="couleur">Couleur de répère : </label>
                        <input type="color" name="couleur" id="couleur">
                    </div>
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
                    <label for="options">Sélectionnez vos dépendances :</label>
                    <!-- Appliquer Select2 à l'élément select -->
                    <select id="options" name="options[]" multiple="multiple">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                        <option value="option4">Option 4</option>
                        <option value="option4">Option 5</option>
                        <option value="option4">Option 6</option>
                        <!-- Ajoutez autant d'options que nécessaire -->
                    </select>
                </div>

                <div class="three item">
                    <h4>Checklist : <span>50</span>%</h4>
                    <div id="pourcent">
                        <!-- ligne -->
                        <hr>
                        <hr id="modifiable">
                    </div>
                    <div class="scrollable-list">
                        <ul>
                            <li class="listes"><input type="checkbox" id="item1"> <label for="item1">Élément 1</label></li>
                            <li class="listes"><input type="checkbox" id="item2"> <label for="item2">Élément 2</label></li>
                            <li class="listes"><input type="checkbox" id="item3"> <label for="item3">Élément 3</label></li>
                            <li class="listes"><input type="checkbox" id="item4"> <label for="item4">Élément 4</label></li>
                            <li class="listes"><input type="checkbox" id="item5"> <label for="item5">Élément 5</label></li>
                            <li class="listes"><input type="checkbox" id="item6"> <label for="item6">Élément 6</label></li>
                        </ul>
                        <i class="fa-solid fa-circle-plus"></i>
                    </div>
                </div>
                <div class="four item">
                    <!-- un bouton pour supprimer -->
                    <button>Supprimer</button>
                    <!-- un bouton pour valider -->
                    <button>Sauvegarder</button>
                </div>
            </form>
        </section>

        <aside id="contact">
            <button>
                ajouter une personne <i class="fa-solid fa-user-plus"></i>
            </button>
            <!-- bloc div ou on aura le chat avec les messages envoyer et recu qui s'affiche -->
            <div class="message">
                <p>Message 1</p>
                <p>Message 1</p>
                <p>Message 1</p>
            </div>
            <!-- un champ ou on écrit le message -->
            <div>
                <input type="text" name="message" id="message" placeholder="Écrire...">
                <a href=""><i class="fa-solid fa-paper-plane"></i></a>
            </div>
        </aside>
    </main>
</body>

</html>