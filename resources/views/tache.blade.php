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
            <form action="{{ route('tache.store', $tache->id) }}" method="post" class="wrapper">
                @csrf
                <div class="one item">
                    <input type="text" name="titre" id="titre" placeholder="Titre" value="{{$tache->designation}}">
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description">{{hexdec($couleur->code_couleur)}}</textarea>
                </div>
                <!-- balise date de création et date de cloture -->
                <div class="two item">
                    <input type="date" name="date_creation" id="date_creation" value="{{$tache->date_creation}}">
                    <input type="date" name="date_cloture" id="date_cloture" value="{{$tache->date_cloture}}">
                    <!-- un champ de saisie d'une couleur -->
                    <div id="choixCouleur">
                        <label for="couleur">Couleur de répère : </label>
                        <input type="color" name="couleur" id="couleur" value="{{sprintf('#%s', str_pad(dechex($couleur->code_couleur), 6, '0', STR_PAD_LEFT))}}">
                    </div>
                    <!-- une liste déroulante etiquette et statut -->
                    <select id="etiquette" name="etiquette">
                        @foreach($etiquettes as $etiquette)
                        <option value="{{$etiquette->id}}" @if($etiquette->id == $tache->id_etiquette) selected @endif>{{$etiquette->designation}}</option>
                        @endforeach
                    </select>
                    <select id="statut" name="statut">
                        @foreach($statuts as $statut)
                        <option value="{{$statut->id}}" @if($statut->id == $tache->id_statut) selected @endif>{{$statut->designation}}</option>
                        @endforeach
                    </select>
                    <label for="options">Sélectionnez vos dépendances :</label>
                    <select id="options" name="options[]" multiple="multiple">
                        @foreach($projets as $projet)
                            @if($projet->id != $tache->id_projet)
                            <option value="{{$projet->id}}">{{$projet->designation}}</option>
                            @endif
                        @endforeach
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
                        <ul class="checklist">
                            @foreach($checklists as $checklist)
                            <li class="listes"><input type="checkbox" id="item{{$checklist->id}}" @if($checklist->checked) checked @endif> <label for="item{{$checklist->id}}">{{$checklist->designation}}</label></li>
                            @endforeach
                        </ul>
                        <i class="fa-solid fa-circle-plus AjoutCheckList"></i>
                    </div>
                </div>
                <div class="four item">
                    <!-- un bouton pour supprimer -->
                    <button type="delete">Supprimer</button>
                    <!-- un bouton pour valider -->
                    <button type="submit">Sauvegarder</button>
                    <!-- un bouton pour valider -->
                    <button>Cloturer</button>
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